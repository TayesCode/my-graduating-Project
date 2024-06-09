<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use PDF;
use Carbon\Carbon;



class MemberController extends Controller
{
  public function dashBoard(){
    // $totalmember=DB::select('select count(*) as total from members');
  $clinics=DB::table('gratitude_clinics')->count();
  $members=DB::table('members')->count();
  $renew=Member::where('status','renewed')->count();
  $schemes=DB::table('schemes')->count();
  $notrenew=Member::where('status','not_renewed')->count();
  $treatedINdividuals=DB::table('register_threated_individuals')->count();
  $collection=[
   'schemes'=>$schemes,
    'clinics'=>$clinics,
    'treatedINdividuals'=>$treatedINdividuals,
    'members'=>$members,
    'renew'=>$renew,
    'notrenew'=>$notrenew,

  ];
//   return DB::table('members')->count();
// return view('admin/adminDashBoard');
//'memberpage/memberDashBoard'
   return view('memberpage/memberDashBoard',$collection);

}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
      [  
        'memberID'=>'required|unique:members|max:255',
        'photo'=>'nullable|mimes:jpeg,png,jpg,gif|image|' ,
        'phone'=>'required|regex:/(09)[0-9]{8}/|unique:members',
        'fName'=>'required|min:3|string',
        'mName'=>'required|min:3|string',
        'lName'=>'required|min:3|string',
        'userName'=>'required|unique:members|max:255',
        'email' =>'required|email|unique:members,email',
        'password'=>'required|min:4',
        'status'=>'required',
        'dateOfBirth'=>'required|date',
        'region'=>'required',
        'zone'=>'required',
        'woreda'=>'required',
        'kebele'=>'required'

       
      ]);       
      if($request->hasfile('photo')){
        //getfilename with extension
        $fileNameWEx=$request->file('photo')->getClientOriginalName();
        //get just file name
        $fileName=pathinfo($fileNameWEx,PATHINFO_FILENAME);
        //just get extension
        $extension=$request->file('photo')->getClientOriginalExtension();
        //file Name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('photo')->storeAs('public/images',$fileNameToStore);

      }
      else{
        $fileNameToStore='no image to store';
      }
       $email=$request->session()->get("loginEmail");
       $staff=Staff::where('email','=',$email)->first();
       $staffID=$staff->employeeID;
       //$staffID=DB::select('select employeeID from staff where email=?',[$email]);

      $member=new Member();
      $member->memberID=$request->input('memberID');
      $member->firstName=$request->input('fName');
      $member->middleName=$request->input('mName');
      $member->lastName=$request->input('lName');
      $member->dateOfBirth=$request->input('dateOfBirth');
      $member->gender=$request->input('gender');
      $member->phone=$request->input('phone');
      $member->status=$request->input('status');
      $member->photo=$fileNameToStore;
      $member->occopation=$request->input('occopation');
      $member->region=$request->input('region');
      $member->zone=$request->input('zone');
      $member->woreda=$request->input('woreda');
      $member->kebele=$request->input('kebele');
      $member->email=$request->input('email');
      $member->userName=$request->input('userName');

      //hashing password
      $hashedPassword=Hash::make($request->input('password'));

      $member->password=$hashedPassword;
     // $member->member_employeeID=$request->input('employeeID');
      $member->member_employeeID=$staffID;
     $result= $member->save();
      if($result)
      return redirect()->back()->with('success','Successfully registered');
      else{
      return redirect()->back()->with('fail','Some problem occur');
      }
      // ->back()->with('success','member registered successfully');
       

      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */

     public function viewProfile($id){
     $data=DB::table('members')
     ->join('childrens','members.memberID','=','childrens.memberID')
     ->select('childrens.id','childrens.memberID','childrens.firstName',
     'childrens.lastName','members.photo','childrens.photo')
     ->where('members.memberID','=',$id)
     ->get();
     return view('healthEx/viewDetails',['family'=>$data]); 
     // $data=Member::find($id)->first();

     
     }
    public function searchMember(Request $request){
      // $member=Member::find($request->search);
          
      $this->validate($request,[ 
        'search'=>'required',
      ]
    );
      $result=$request['search'];
       $phone=DB::select('select memberID,firstName,middleName,lastName,status,photo,phone from members where phone=?',[$result]);
       $memberID=DB::select('select memberID,firstName,middleName,lastName,status,photo,phone from members where memberID=?',[$result]);
       $userName=DB::select('select memberID,firstName,middleName,lastName,status,photo,phone from members where userName=?',[$result]);
       $email=DB::select('select memberID,firstName,middleName,lastName,status,photo,phone from members where email=?',[$result]);


       if($phone){
        return view('healthEx/searchedValue',['member'=>$phone]);
      }
       else if($memberID){
        return view('healthEx/searchedValue',['member'=>$memberID]);
      }
       else if($userName){
        return view('healthEx/searchedValue',['member'=>$userName]);

       }
       else if($email){
        return view('healthEx/searchedValue',['member'=>$email]);

       }
       else{
        return redirect()->back()->with('fail','No user  with the input requirements');
       }
      
      
    }
    public function show()
    {   
        
        $member = Member::paginate(5);

         return view('healthEx/viewMembers',['members'=>$member]);

    }
    public function giveMembershipID($id){

      $data=Member::find($id);
      $result=DB::select('select firstName,middleName,photo from childrens where memberID=?',[$id]);
      $family =[
        'data'=>$data,
        'result'=>$result
    ];
    $pdf=PDF::loadView('healthEx.membershipID',$family);
  
       return $pdf->download('memberID.pdf');
   
     

      
    }
    public function generateMembershipID($id){
      // $data=new RegisterThreatedIndividual();
      $dataOfArray=array();

  $data=Member::find($id);
  $result=DB::select('select firstName,middleName,photo from childrens where memberID=?',[$id]);


  $family =[
      'data'=>$data,
      'result'=>$result
  ];

  

  $pdf=PDF::loadView('healthEx.giveMembershipID',$family);

     return $pdf->download('memberIDpdf');
      // return view('cardOfficer.generatReport',['allData'=>$allData]);
  }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    // for children
    public function edit($id,Request $request)
    {
      $email=$request->session()->get("loginEmail");
      $staff=Staff::where('email','=',$email)->first();
      $rr= Member::where('memberID','=',$id)->first();
     
      $staffID=$staff->employeeID;
      $data=Member::find($id) ;
      $result=$data->member_employeeID;
      // $str2=implode(" ",$data);
      // $str3=implode(" ",$staffID);
      
      // dd(strcmp($str2,$str3));
      // if($rr===$staffID){
             return view('healthEx.editMember',['data'=>$data]);
    //}
      // else{
      //   return redirect()->back()->with('fail','you have not privilagefor editing');
      // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request)
    {
      
      if($request->hasfile('photo')){
        //getfilename with extension
        $fileNameWEx=$request->file('photo')->getClientOriginalName();
        //get just file name
        $fileName=pathinfo($fileNameWEx,PATHINFO_FILENAME);
        //just get extension
        $extension=$request->file('photo')->getClientOriginalExtension();
        //file Name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('photo')->storeAs('public/images',$fileNameToStore);

      }
      else{
        $fileNameToStore='no image to store';
      }
       $email=$request->session()->get("loginEmail");
       $staff=Staff::where('email','=',$email)->first();
       $staffID=$staff->employeeID;
       //$staffID=DB::select('select employeeID from staff where email=?',[$email]);

      $member=Member::find($request->memberID);
      $member->memberID=$request->input('memberID');
      $member->firstName=$request->input('fName');
      $member->middleName=$request->input('mName');
      $member->lastName=$request->input('lName');
      $member->dateOfBirth=$request->input('dateOfBirth');
      $member->gender=$request->input('gender');
      $member->phone=$request->input('phone');
      $member->status=$request->input('status');
      $member->photo=$fileNameToStore;
      $member->occopation=$request->input('occopation');
      $member->region=$request->input('region');
      $member->zone=$request->input('zone');
      $member->woreda=$request->input('woreda');
      $member->kebele=$request->input('kebele');
      $member->email=$request->input('email');
      $member->userName=$request->input('userName');

      //hashing password
      $hashedPassword=Hash::make($request->input('password'));

      $member->password=$hashedPassword;
     // $member->member_employeeID=$request->input('employeeID');
      $member->member_employeeID=$staffID;
     $result= $member->save();

      if($result){ 
      return redirect()->back()->with('success','successfully updated');
          }
      // ->back()->with('success','member registered successfully');
      else{
        return redirect()->back()->with('fail','Some problem occur to  update');
       }

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
              // $children=Children::find($id);
              // $children->delete();
        $member=Member::find($id);
        $member->delete();
        return redirect()->back()->with('success','delete successfully');
       
        
    }
    //for card officer validity of eligibility
    public function validatePhone(Request $request){
    
      $this->validate($request,[ 
        'search'=>'required',
      ]
    );
      $result=$request['search'];
      // $result=Member::where('phone','like','%'.$phone.'%')->get();
       $phone=DB::select('select memberID,firstName,middleName,lastName,status,photo from members where phone=?',[$result]);
       $memberID=DB::select('select memberID,firstName,middleName,lastName,status,photo from members where memberID=?',[$result]);
       $userName=DB::select('select memberID,firstName,middleName,lastName,status,photo from members where userName=?',[$result]);

       if($phone){
        return view('cardOfficer.validatedResultPage',['result'=>$phone]) ;
       }
       else if($memberID){
        return view('cardOfficer.validatedResultPage',['result'=>$memberID]) ;
       }
       else if($userName){
        return view('cardOfficer.validatedResultPage',['result'=>$userName]) ;

       }
       else{
        return redirect()->back()->with('fail','No user  with the input requirements');
       }
      
   
    }
    public function memberViewProfile(){

     $email=Session()->get('loginEmail');
     $member=Member::where('email','=',$email)->first(); 
    return view('memberpage.memberProfile',['data'=>$member]);
    
    } 
    public function memberViewChild(){
      $email=Session()->get('loginEmail');
      $data=DB::table('members')
      ->join('childrens','members.memberID','=','childrens.memberID')
      ->select('childrens.id','childrens.memberID','childrens.firstName',
      'childrens.lastName','members.photo','childrens.photo')
      ->where('members.email','=',$email)
      ->get();
    }
    public function memberViewDetail($id){
      $data=Member::find($id);
      return view('memberpage.memberDetail',['data'=>$data]);

    }
    public function memberViewChildDetail($id){

      $data=Children::find($id);
      return $data;

    }
    public function renew($id){
      $data=Member::find($id);
      $data2=$data->updated_at;
      $today=Carbon::now()->subday(340);
      $renewed='renewed';
      $not_renewed='not_renewed';
      if($data2<=$today){
        if($data->status==$renewed){
          $data->update(['status'=>$not_renewed]);
          return redirect()->back()->with('success','not renewed');
        }
        else {
          $data->update(['status'=>$renewed]);
          return redirect()->back()->with('success','renewed');
        }
      }
      else{
        return redirect()->back()->with('fail','due to renewal period');

      }
      
    
     
    }
   
}
