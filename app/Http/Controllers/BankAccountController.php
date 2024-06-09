<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
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
            'accountID'=>'required|unique:bank_accounts',
            'ownerName'=>'required',
            'accountNumber'=>'required|numeric',
            'accountType'=>'required',
          ]);

        if($request){
             $bankAccount=new BankAccount();
             $bankAccount->accountID=$request->input('accountID');
             $bankAccount->ownerName=$request->input('ownerName');
             $bankAccount->accountNumber=$request->input('accountNumber');
             $bankAccount->type=$request->input('accountType');
            $result= $bankAccount->save();
            if($result)
             return redirect()->back()->with('success','successfulley  stored');
             else{
                return redirect()->back()->with('fail','Fail to store');
             }
         }
         else{
          return redirect()->back()->with('fail','Not registered ');
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
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function showForFinanceOfficer()
    {
        $data=BankAccount::all();
        return view('financeOfficer.fviewBankAcounts',['data'=>$data]);
    }
    public function showForHealthEx()
    {
        $data=BankAccount::all();
        return view('healthEx.hviewBankAcounts',['data'=>$data]);
    }
    public function showForBoard()
    {
        $data=BankAccount::all();
        return view('board.bviewBankAcounts',['data'=>$data]);
    }
    public function deleteBankAccount($temp){
        $acount=BankAccount::find($temp)->first();
        return $acount;
        $acount->delete();
        return redirect()->back()->with('success','success');
    }


    public function edit(BankAccount $bankAccount)
    {
        
    }


    public function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
