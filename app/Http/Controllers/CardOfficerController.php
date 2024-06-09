<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Member;
use App\Models\Staff;
class CardOfficerController extends Controller
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
    public function dashBoard(){
        // $totalmember=DB::select('select count(*) as total from members');
      $clinics=DB::table('gratitude_clinics')->count();
      $members=DB::table('members')->count();
      $schemes=DB::table('schemes')->count();
      $renew=Member::where('status','renewed')->count();
      $cardofficer=Staff::where('role','cardOfficer')->count();
      $notrenew=Member::where('status','not_renewed')->count();
      $clinicalAuditor=Staff::where('role','clinicalAuditor')->count();
      $treatedINdividuals=DB::table('register_threated_individuals')->count();
      $collection=[
        'cardofficer'=>$cardofficer,
        'clinics'=>$clinics,
        'treatedINdividuals'=>$treatedINdividuals,
        'members'=>$members,
        'renew'=>$renew,
        'notrenew'=>$notrenew,

      ];
    //   return DB::table('members')->count();
   // return view('admin/adminDashBoard');
       return view('cardOfficer.cardOfficerDashBoard',$collection);
    
    }
}
