<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification as FacadsNotification;
use DB;
class AdminController extends Controller
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
    public function sendNotification(Request $request){
        $staff = Staff::all();
        $project = [
            'greeting' => $request->greeting,',',
            'body' => $request->body,
            'thanks' => $request->thanks,
            'actionText' => 'View Project',
            'actionURL' => url('/'),
           
        ];
  
        FacadsNotification::send($staff, new EmailNotification($project));
   
       return redirect()->back()->with('success','notification sent successfully');
    }
    public function dashBoard(){
        // $totalmember=DB::select('select count(*) as total from members');
      $totalstaff=DB::table('staff')->count();
      $healthExtension=Staff::where('role','healthextension')->count();
      $member=DB::table('members')->count();
      $board=Staff::where('role','board')->count();
      $financeOfficer=Staff::where('role','financeOfficer')->count();
      $cardOfficer=Staff::where('role','cardOfficer')->count();
      $collection=[
        'totalstaff'=>$totalstaff,
        'healthExtension'=>$healthExtension,
        'member'=>$member,
        'board'=>$board,
        'financeOfficer'=>$financeOfficer,
        'cardOfficer'=>$cardOfficer,
      ];
    //   return DB::table('members')->count();
   // return view('admin/adminDashBoard');
       return view('admin/adminDashBoard',$collection);
    
    }
    }

