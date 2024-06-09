<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Staff;
use DB;
use App\Models\UpdateRequest;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification as FacadsNotification;

class HealthExtensionController extends Controller
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
    public function displayNotificationpage(){
        return view('healthEx.sendNotification');
    }
    public function sendNotification(Request $request) 
    {
    	$member = Member::all();
         
        $project = [
            'greeting' => $request->greeting,',',
            'body' => $request->body,
            'thanks' => $request->thanks,
            'actionText' => 'View Project',
            'actionURL' => url('/'),
           
        ];
  
        FacadsNotification::send($member, new EmailNotification($project));
   
        return redirect()->back()->with('success','notification sent  successfully');
    }

    public function viewRequest(){
        $data=UpdateRequest::orderBy('created_at', 'desc')->get();


        return view('healthEx.viewRequests',['data'=>$data]) ;
    }
    public function deleteRequest($id){
        $req=UpdateRequest::find($id);
        $req->delete();
        return redirect()->back()->with('success','deleted successfully');

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
public function dashBoard(){
    // $totalmember=DB::select('select count(*) as total from members');
  
  $total=DB::table('members')->count();
  $renew=Member::where('status','renewed')->count();
  $unrenew=Member::where('status','not_renewed')->count();
  $totalrequest=DB::table('update_requests')->count();
  $collection=[
    'total'=>$total,
    'renew'=>$renew,
    'unrenew'=>$unrenew,
    'totalrequests'=>$totalrequest
  ];
//   return DB::table('members')->count();
   return view('healthEx/healthExDashBoard',$collection);

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
