<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\RegisterThreatedIndividual;
use Illuminate\Http\Request;
use PDF;
use DB;
class RegisterThreatedIndividualController extends Controller
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
    public function create(Request $request)
    { 
        
        $this->validate($request,[
        'memberID'=>'required|exists:members,memberID|',
        'phone'=>'required|numeric|min:10',
        'fName'=>'required|min:3',
        'lName'=>'required|min:3',
        'clinicID'=>'required|exists:gratitude_clinics,g_clinicID',
        ]);
        
        $email=$request->session()->get("loginEmail");
        $cardOfficer=staff::where('email','=',$email)->first();
        $cardOfficerID=$cardOfficer->employeeID;
        
        $RegisterThreated=new RegisterThreatedIndividual();
        $RegisterThreated->memberId=$request->input('memberID');
        $RegisterThreated->firstName=$request->input('fName');
        $RegisterThreated->lastName= $request->input('lName');
      //  $RegisterThreated->gender= $request->input('gender');
        $RegisterThreated->phone=$request->input('phone');
        $RegisterThreated->gratitudeclinicID=  $request->input('clinicID');
        $RegisterThreated->cardOfficer= $cardOfficerID;

        $result=$RegisterThreated->save();
        if($result)
        return redirect()->back()->with('success','successfully registered');
        else{
            return redirect()->back()->with('fail','Not registered');
        }
    }
    public function generateReport(){
        // $data=new RegisterThreatedIndividual();
        $dataOfArray=array();

    $allData=DB::table('register_threated_individuals')
    ->join('gratitude_clinics','register_threated_individuals.gratitudeclinicID',
    '=','gratitude_clinics.g_clinicID')
    ->select('register_threated_individuals.memberID','register_threated_individuals.firstName',
    'register_threated_individuals.lastName','register_threated_individuals.gratitudeclinicID','gratitude_clinics.name','register_threated_individuals.created_at')
    ->get();


    $treated =[
        'treated'=>$allData
    ];

    
  
    $pdf=PDF::loadView('cardOfficer.generatReport',$treated);

       return $pdf->download('treatedIndividual.pdf');
        // return view('cardOfficer.generatReport',['allData'=>$allData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showThreatedIndividual(){
        $treatedIndividual=DB::table('register_threated_individuals')
        ->join('gratitude_clinics','register_threated_individuals.gratitudeclinicID','=','gratitude_clinics.g_clinicID')
        ->select('register_threated_individuals.memberID','register_threated_individuals.firstName',
        'register_threated_individuals.lastName','gratitude_clinics.name',
        'register_threated_individuals.phone','register_threated_individuals.created_at')
        ->get();
        // $treatedIndividual=RegisterThreatedIndividual::all();
        return view('cardOfficer.viewThreatedIndividual',['allData'=>$treatedIndividual]);
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterThreatedIndividual  $registerThreatedIndividual
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterThreatedIndividual $registerThreatedIndividual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterThreatedIndividual  $registerThreatedIndividual
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterThreatedIndividual $registerThreatedIndividual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterThreatedIndividual  $registerThreatedIndividual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterThreatedIndividual $registerThreatedIndividual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterThreatedIndividual  $registerThreatedIndividual
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterThreatedIndividual $registerThreatedIndividual)
    {
        //
    }
}
