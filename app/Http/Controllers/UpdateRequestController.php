<?php

namespace App\Http\Controllers;

use App\Models\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use DB;

class UpdateRequestController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateRequest(){
        return view('memberpage/updateRequest');
    }
    public function store(Request $request)
    { $updateRequest = new UpdateRequest();

      $result2 = DB::table('members')
           ->where('memberID',$request->memberID)
           ->pluck('member_employeeID')
           ->first();
          $updateRequest->memberID=$request->input('memberID');
          $updateRequest->subject=$request->input('subject');
          $updateRequest->extension_id=$result2;
          $updateRequest->description=$request->input('description');
         $result= $updateRequest->save();
         if($result){ 
          return redirect()->back()->with('success','The request send properly');
        }
         else{
            return redirect()->back()->with('fail','The request is not successfull');
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpdateRequest  $updateRequest
     * @return \Illuminate\Http\Response
     */
    public function show(UpdateRequest $updateRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpdateRequest  $updateRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateRequest $updateRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpdateRequest  $updateRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateRequest $updateRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpdateRequest  $updateRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateRequest $updateRequest)
    {
        //
    }
}
