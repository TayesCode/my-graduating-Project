<?php

namespace App\Http\Controllers;

use App\Models\ClinicalAuditor;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\GratitudeClinic;
use File;
use Response;

class ClinicalAuditorController extends Controller
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
        
    }
    public function viewGratitudeClinics()
    {
        $data=GratitudeClinic::all();
        return view('clinicalAuditor.viewGratitudeClincs',['result'=>$data]);
        
    }
    ///
    public function viewAuditReport()
    {
        $data=ClinicalAuditor::all();
        return view('board.viewAuditReport',['result'=>$data]);
        
    }
    public function download($fileUpload){
        
       // $file=public_path('storage/images/'.$fileUpload);
      
        if(file_exists(public_path('storage/images/'.$fileUpload))
        ){
        $file=public_path('storage/images/'.$fileUpload); 
        return Response::download($file);}
        else{
            return redirect()->back()->with('fail','file is not available');
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
        $this->validate($request,[
            'nameOfClinic'=>'required|exists:gratitude_clinics,name',
            'auditResult'=>'required',
            'fileupload'=>'file',
            'clinicID'=>'required|exists:gratitude_clinics,g_clinicID',

        ]);
        if($request->hasfile('fileupload')){
            //getfilename with extension
            $fileNameWEx=$request->file('fileupload')->getClientOriginalName();
            //get just file name
            $fileName=pathinfo($fileNameWEx,PATHINFO_FILENAME);
            //just get extension
            $extension=$request->file('fileupload')->getClientOriginalExtension();
            //file Name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('fileupload')->storeAs('public/images',$fileNameToStore);
    
          }
          else{
            $fileNameToStore='File is not uploaded';
          }
        $email=$request->session()->get("loginEmail");
        $staff=Staff::where('email','=',$email)->first();
        $staffID=$staff->employeeID;
    
        $data=new ClinicalAuditor();
        $data->nameOfClinic=$request->nameOfClinic;
        $data->auditResult=$request->auditResult;
        $data->fileupload= $fileNameToStore;
        $data->clinicID=$request->clinicID;
        $data->staffID= $staffID;
        $result=$data->save();
      if($result){
        return redirect()->back()->with('success','successfully registered');
      }
      else{
        return redirect()->back()->with('fail','failed to register');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClinicalAuditor  $clinicalAuditor
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicalAuditor $clinicalAuditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClinicalAuditor  $clinicalAuditor
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalAuditor $clinicalAuditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClinicalAuditor  $clinicalAuditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicalAuditor $clinicalAuditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClinicalAuditor  $clinicalAuditor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicalAuditor $clinicalAuditor)
    {
        //
    }
    public function dashBoard(){
        // $totalmember=DB::select('select count(*) as total from members');
      $audited=DB::table('clinical_auditors')->count();
      $clinics=DB::table('gratitude_clinics')->count();
      $members=DB::table('members')->count();
      $staff=DB::table('staff')->count();
      $clinicalAuditor=Staff::where('role','clinicalAuditor')->count();
      $treatedINdividuals=DB::table('register_threated_individuals')->count();
      $collection=[
        'audited'=>$audited,
        'clinics'=>$clinics,
        'treatedINdividuals'=>$treatedINdividuals,
        'clinicalAuditor'=>$clinicalAuditor,
        'members'=>$members,
        'staff'=>$staff,

      ];
    //   return DB::table('members')->count();
   // return view('admin/adminDashBoard');
       return view('clinicalAuditor/clinicalAuditorDashBoard',$collection);
    
    }
}
