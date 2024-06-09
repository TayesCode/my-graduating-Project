<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class ChildrenController extends Controller
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
    public function create()
    {
        //
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
        'memberID'=>'required|exists:members,memberID|max:255',
        'photo'=>'nullable|mimes:jpeg,png,jpg,gif|image' ,
        'fName'=>'required|min:3|string',
        'mName'=>'required|min:3|string',
        'lName'=>'required|min:3|string',
        'disablity'=>'required',
        'dateOfBirth'=>'required|date',


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
        $children=new Children();
        $children->memberID=$request->input('memberID');
        $children->firstName=$request->input('fName');
        $children->middleName=$request->input('mName');
        $children->lastName=$request->input('lName');
        $children->dateOfBirth=$request->input('dateOfBirth');
        $children->gender=$request->input('gender');
        $children->status=$request->input('disablity');
        $children->photo=$fileNameToStore;
        $children->employeeID=$staffID;
        $children->save();
        return redirect()->back()->with('success','successfully registered family member');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function show(Children $children)
    {
        $data=$children::paginate(5);
       

        return view('healthEx/viewChildren',['children'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data=Children::find($id) ;
    
      return view('healthEx.editFamilyMember',['data'=>$data]);
    }
    public function memberViewChild(){
      $email=Session()->get('loginEmail');
      $data=DB::table('members')
      ->join('childrens','members.memberID','=','childrens.memberID')
      ->select('childrens.id','childrens.memberID','childrens.firstName',
      'childrens.lastName','members.photo','childrens.photo')
      ->where('members.email','=',$email)
      ->get();
     return view('memberpage.viewChild',['family'=>$data]);
    }
    public function memberViewChildDetail($id){
      $data=Children::find($id);
      return view('memberpage.childDetail',['data'=>$data]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){ 
     
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

      $children= Children::find($request->id);
      $children->id=$request->id;
      $children->memberID=$request->input('memberID');
      $children->firstName=$request->input('fName');
      $children->middleName=$request->input('mName');
      $children->lastName=$request->input('lName');
      $children->dateOfBirth=$request->input('dateOfBirth');
      $children->gender=$request->input('gender');
      $children->status=$request->input('disablity');
      $children->photo=$fileNameToStore;
      $children->employeeID=$staffID;
      $children->save();
      return redirect()->back()->with('success','successfully updated family member');
    
        
    }
    public function viewDetail($id){
      $child=Children::findOrFail($id);
      return view('healthEx/detailOfChild',['child'=>$child]);

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$child=Children::find($id);
        //$child->delete();
        DB::delete('delete from childrens where id=?',[$id]);
       // return $id;
       return redirect()->back()->with('success','successfully updated family member');

    }

    //card Officer 
    public function listOfFamily($id){
      // $result=DB::select('select memberID,firstName,middleName,lastName,status,photo from members where phone=?',[$phone]);

      $data=DB::select('select firstName,middleName,lastName,photo from childrens where memberID=?',[$id]);
      if($data)
      return view('cardOfficer.listOfFamilyMembers',['result'=>$data]);
      else
      return 'No registered member';
    }
}
