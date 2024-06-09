<?php

namespace App\Http\Controllers;

use App\Models\MemberPayment;
use Illuminate\Http\Request;
use App\Models\Staff;
use DB;
use PDF;

class MemberPaymentController extends Controller
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
    public function create( Request $request)

    {
    
        $this->validate($request,[
            'memberID'=>'required|exists:members',
            'dateOfPayment'=>'required|date',
            'type'=>'required',
            'amount'=>'required|numeric',
            'waysOfPayment'=>'required',
            'accountID'=>'required|exists:bank_acounts'
          ]);
        
          $email=$request->session()->get("loginEmail");
          $healthextension=Staff::where('email','=',$email)->first();
          $staffID=$healthextension->employeeID;
      $payment= new MemberPayment();
    //   $payment->paymentID=$request->input('paymentID');
      $payment->dateOfPayment=$request->input('dateOfPayment');
      $payment->typesOfPayment=$request->input('type');
      $payment->amount=$request->input('amount');
      $payment->memberID=$request->input('memberID');
      $payment->waysOfPayment=$request->input('waysOfPayment');
      $payment->accountID=$request->input('accountID');
      $payment->employeeID=$staffID;
      $result=$payment->save();
      if($result)
      return redirect()->back()->with('success','successfully registered');
    else{
      return redirec()->back()->with('fail','Not registered successfully');
    }
    }
public function viewPayment(){
    $payment=DB::table('member_payments')
    ->join('members','members.memberID','=','member_payments.memberID')
    ->select('members.firstName','members.memberID','members.middleName',
    'member_payments.amount','member_payments.dateOfPayment','member_payments.id')  
      ->get();
    return view('healthEx.viewPayment',['payment'=>$payment]);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function giveReceite($id){
        $data=DB::table('member_payments')
        ->join('members','members.memberID','=','member_payments.memberID')
        ->select('members.firstName','members.memberID','members.middleName',
        'member_payments.amount','member_payments.dateOfPayment')->
        where('member_payments.id','=',$id) 
          ->get();
        $payment =[
          'data'=>$data
      ];
    //   return $payment;
      $pdf=PDF::loadView('healthEx.reciept',$payment);
    
         return $pdf->download('reciept.pdf');
    }
    public function registerPayment(){
        return view('healthEx.hregisterPayment');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function show(MemberPayment $memberPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberPayment $memberPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberPayment $memberPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberPayment $memberPayment)
    {
        //
    }
}
