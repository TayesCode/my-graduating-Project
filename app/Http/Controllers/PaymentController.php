<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use  PDF;

class PaymentController extends Controller
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
        $email=$request->session()->get("loginEmail");
        $staff=Staff::where('email','=',$email)->first();
        $staffID=$staff->employeeID;

        $this->validate($request,[
          'paymentID'=>'required|unique:payments',
          'dateOfPayment'=>'required|date',
          'type'=>'required',
          'amount'=>'required|numeric',
          'sourceOfPayment'=>'required',
          'accountID'=>'required|exists:bank_acounts'
        ]);


    $payment= new Payment();
    $payment->paymentID=$request->input('paymentID');
    $payment->dateOfPayment=$request->input('dateOfPayment');
    $payment->typesOfPayment=$request->input('type');
    $payment->amount=$request->input('amount');
    $payment->cashier=$request->input('cashier');
    $payment->waysOfPayment=$request->input('sourceOfPayment');
    $payment->accountID=$request->input('accountID');
    $payment->staffID=$staffID;
    $result=$payment->save();
    if($result)
    return redirect()->back()->with('success','successfully registered');
  else{
    return redirec()->back()->with('fail','Not registered successfully');
  }

    }
    public function editPaymentSave(Request $request)

    {
        $payment= Payment::find($request->paymentID);
        $this->validate($request,[
        //   'paymentID'=>'required|unique:payments',
          'dateOfPayment'=>'required|date',
          'type'=>'required',
          'amount'=>'required|numeric',
          'sourceOfPayment'=>'required',
          'accountID'=>'required|exists:bank_acounts'
        ]);
        $email=$request->session()->get("loginEmail");
        $staff=Staff::where('email','=',$email)->first();
        $staffID=$staff->employeeID;

    
    // $payment->paymentID=$request->input('paymentID');
    $payment->dateOfPayment=$request->input('dateOfPayment');
    $payment->typesOfPayment=$request->input('type');
    $payment->amount=$request->input('amount');
    $payment->cashier=$request->input('cashier');
    $payment->waysOfPayment=$request->input('sourceOfPayment');
    $payment->accountID=$request->input('accountID');
    $payment->staffID= $staffID;
    $result=$payment->save();
    if($result)
    return redirect()->back()->with('success','successfully updated');
  else{
    return redirec()->back()->with('fail','Not updated successfully');
  }

    }


    public function store(Request $request)
    {
        //
    }
   


    public function show(Payment $payment)
    {
        return $payment::all();
    }
    public function viewCashIn( Request $request){
        $email=$request->session()->get("loginEmail");
        $staff=Staff::where('email','=',$email)->first();
        $staffID=$staff->employeeID;


        $cashin='cashin';
    
        $result=DB::select('select dateOfPayment,typesOfPayment,
        amount,waysOfPayment,accountID,employeeID from member_payments where 
        typesOfPayment=?',[$cashin]);
     return view('financeOfficer/viewCashin',['cashin'=>$result]);
 
  }
    public function cashinfromfinance(){
        $cashin='cashin';
        $result=DB::select('select staffID,paymentID,dateOfPayment,typesOfPayment,
        amount,waysOfPayment,accountID from payments');
        return view('financeOfficer/fromfiinance',['cashin'=>$result]);
    }
    public function viewCashOut(){
        //  $data=Payment::paginate(5);
         $cashout='cashout';
         $result=DB::select('select paymentID,dateOfPayment,typesOfPayment,amount,cashier,waysOfPayment,accountID from payments where typesOfPayment=?',[$cashout]);
              
         return view('financeOfficer/viewCashout',['cashout'=>$result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function editPayment( $paymentID)
    {
        $payment=Payment::find($paymentID);
        // return view('financeOfficer.editPayment',);
        return view('financeOfficer.editPayment',['data'=>$payment]);
    }
    public function financedelete($paymentID)
    {
       $payment=Payment::find($paymentID);
       $payment->delete();
       return redirect()->back()->with('success','The item is deleted');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
    public function generate()
    {
      $mytime = Carbon::now()->subDays(7);
      $result=DB::select('select paymentID,dateOfPayment,
      typesOfPayment,amount,cashier,waysOfPayment,accountID,staffID 
      from payments 
      where dateOfPayment>=?',[$mytime]);
      $dataOfArray=array();
      $report =[
          'result'=>$result
      ];
    $pdf=PDF::loadView('financeOfficer.generate',$report);
    // $pdf=PDF::loadView('financeOfficer.elshu');
    
    return $pdf->download('generate.pdf');
   

    }
}
