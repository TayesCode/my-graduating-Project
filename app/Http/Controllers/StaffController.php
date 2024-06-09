<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\AdminAcount;
use App\Models\Scheme;
use Illuminate\Support\Facades\Hash;
use Image;
use DB;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){ 
        
        $this->validate($request,
        [  
          'employeeID'=>'required|unique:staff|max:255',
          'phone'=>'required|numeric|unique:staff',
          'fName'=>'required|min:3',
          'mName'=>'required|min:3',
          'lName'=>'required|min:3',
          'userName'=>'required|unique:staff|max:255',
          'email'=>'required|unique:staff|regex:/(.+)@(.+)\.(.+)/i',
          'password'=>'required|min:4',
          'dateofbirth'=>'required|date',
          'region'=>'required',
          'zone'=>'required',
          'woreda'=>'required',
          'kebele'=>'required',
          'profession'=>'required',
           'photo'=>'image|required|mimes:jpeg,png,jpg,gif,svg',
          'schemeID'=>'required|exists:schemes,schemeID'
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
        $admin=AdminAcount::where('email','=',$email)->first();
        $adminID=$admin->id;


        $staff=new Staff();
        $staff->employeeID=$request->input('employeeID');
        $staff->adminID=$adminID;
        $staff->firstName= $request->input('fName');
        $staff->middleName=$request->input('mName');
        $staff->lastName=$request->input('lName');
        $staff->dateOfBirth= $request->input('dateofbirth');
        $staff->gender= $request->input('gender');
        $staff->region=$request->input('region');
        $staff->zone=  $request->input('zone');
        $staff->woreda=$request->input('woreda');
        $staff->email =$request->input('email');
        $staff->kebele=$request->input('kebele');
        $staff->phone= $request->input('phone');

        $staff->profession= $request->input('profession');
        $staff->levelOfEducation=  $request->input('educationlevel');
        $staff->userName=$request->input('userName');
        //hashing the password
        $hashPassword=Hash::make($request->input('password'));
        $staff->password=$hashPassword;
        $staff->role = $request->input('role');
        $staff->schemeID=$request->input('schemeID');
        $staff->photo=$fileNameToStore;
        $staff->save();
        if($staff)
        return redirect()->back()->with('success','register successfully');
else{
   return redirect()->back()->with('fail','not register successfully');

}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        $staffs=Staff::paginate(5);
        return view('admin/viewStaffAcount',['staffs'=>$staffs]);

    }
    public function deleteStaff($id){
        $staff=Staff::find($id);
        $staff->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */

    public function editAccount( $id)
    {    
        $staff=Staff::find($id);
        return view('admin/editAccount',compact('staff','id'));
    }
    public function viewBySearch(Request $request){
    
        $this->validate($request,[ 
            'employeeID'=>'required',
          ]
        );
        $staffID=$request->input('employeeID');

       
        $phone=DB::select('select employeeID,firstName,middleName,
        lastName,role,phone from staff where phone=?',[$staffID]);
        $staffByID=DB::select('select employeeID,firstName,middleName,
        lastName,role,phone from staff where employeeID=?',[$staffID]);
     
        $userName=DB::select('select employeeID,firstName,middleName,
        lastName,role,phone from staff where userName=?',[$staffID]);
  
        $email=DB::select('select employeeID,firstName,middleName,
        lastName,role,phone from staff where email=?',[$staffID]);
        $role=DB::select('select employeeID,firstName,middleName,
        lastName,role,phone from staff where role=?',[$staffID]);
      
        // return view('admin/searchedPage',['staff'=>$phone]);

        if($staffByID){
        return view('admin/searchedPage',['staff'=>$staffByID]);
      }
        else if($phone){
            return view('admin/searchedPage',['staff'=>$phone]);
        }
        else if($email){
            return view('admin/searchedPage',['staff'=>$email]);
        }
        else if($userName){
          return view('admin.searchedPage',['staff'=>$userName]);
        }
        else if($role){
          return view('admin.searchedPage',['staff'=>$role]);
        }
        else {
            return redirect()->back()->with('fail','no staff found with the input parameter');
        }

        
    }
    public  function updateAcount(Request $request){
        // $this->validate($request,
        // [  
        //   'employeeID'=>'required|unique:staff|max:255',
        //   'phone'=>'required|numeric',
        //   'fName'=>'required|min:3',
        //   'mName'=>'required|min:3',
        //   'lName'=>'required|min:3',
        //   'userName'=>'required|unique:staff|max:255',
        //   'email'=>'required|unique:staff|regex:/(.+)@(.+)\.(.+)/i',
        //   'password'=>'required|min:4',
        //   'dateofbirth'=>'required|date',
        //   'region'=>'required',
        //   'zone'=>'required',
        //   'woreda'=>'required',
        //   'kebele'=>'required',
        //   'profession'=>'required',
        //   'photo'=>'image|required|mimes:jpeg,png,jpg,gif,svg',
        //  ]);  
          
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
        // for session
       $email=$request->session()->get("loginEmail");
        $admin=AdminAcount::where('email','=',$email)->first();
       $adminID=$admin->id;
        
       $staff=Staff::find($request->input('employeeID'));
        $staff->adminID=1;
        $staff->firstName= $request->input('fName');
        $staff->middleName= $request->input('mName');
        $staff->lastName=$request->input('lName');
        $staff->dateOfBirth= $request->input('dateofbirth');
        $staff->gender= $request->input('gender');
        $staff->region=$request->input('region');
        $staff->zone=  $request->input('zone');
        $staff->woreda=$request->input('woreda');
        $staff->email=$request->input('email');
        $staff->kebele=$request->input('kebele');
        $staff->phone= $request->input('phone');
        $staff->profession= $request->input('profession');
        $staff->levelOfEducation=  $request->input('educationlevel');
        $staff->userName=$request->input('userName');
        $hashPassword=Hash::make($request->input('password'));
        $staff->password=$hashPassword;
        $staff->role = $request->input('role');
        $staff->photo=$fileNameToStore;
        $staff->schemeID=$request->input('schemeID');
        
        $staff->save();
        if($staff)
         return redirect()->back()->with('success','update successfully');
else{
    return redirect()->back()->with('fail','not update successfully');

}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */

     //Search individual 
    public function update(Request $request, $staffId)
    {
        
    }
    public function viewStaffMember(){
        $data=Staff->paginate(5);
        return view('board/viewStaff',['staffs'=>$data]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */

    public function viewProfileStaff($id){
        $staff=Staff::find($id);
        return view('admin.staffDetails',['staff'=>$staff]);
     }
    // public function viewProfile($id){
      //  $staff=Staff::find($id);
       // return view('admin.staffDetails',['staff'=>$staff]);
    // }
     //
     public function viewProfileboard($id){
        $staff=Staff::find($id);
        return view('admin.staffDetails',['staff'=>$staff]);
     }
    public function destroy(Staff $staff)
    {
        //
    }
}
