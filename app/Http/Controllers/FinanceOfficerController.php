<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Models\Payment;
use App\Models\MemberPayment;
use DB;
class FinanceOfficerController extends Controller
{


    public function dashBoard(){
      $payments=DB::table('payments')->count();
      $memberpayments=DB::table('member_payments')->count();
      $renewal=MemberPayment::where('waysOfPayment','renewal')->count();
      $register=MemberPayment::where('waysOfPayment','register')->count();

      $cashin=Payment::where('typesOfPayment','cashin')->count();
      $cashout=Payment::where('typesOfPayment','cashout')->count();

      $collection=[
       'payments'=>$payments,
        'memberpayments'=>$memberpayments,
        'cashin'=>$cashin,
        'cashout'=>$cashout,
        'register'=>$register,
        'renewal'=>$renewal,
         
    
      ];
    //   return DB::table('members')->count();
    // return view('admin/adminDashBoard');
    //'memberpage/memberDashBoard'
       return view('financeOfficer/financeOfficerDashBoard',$collection);
    
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
