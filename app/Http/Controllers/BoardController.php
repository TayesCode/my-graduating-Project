<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification as FacadsNotification;

class BoardController extends Controller
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
    public function viewStaffProfile($id){
        $staff=Staff::find($id);
        // return $staff;
       return view('board.viewStaffProfile',['staff'=>$staff]);

    }
public function boardStaffView(){
    $staffs=Staff::paginate(5);
    return view('board/viewStaff',['staffs'=>$staffs]);
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
    public function show()
    {   
        
        $member = Member::paginate(5);
        // return view('healthEx.viewMembers');
        // DB::table('members')->paginate(15) //you can  use in iin theplace of $member
         return view('board/viewMembers',['members'=>$member]);

    }
    public function BoardViewProfile($id){
        $data=DB::table('members')
        ->join('childrens','members.memberID','=','childrens.memberID')
        ->select('childrens.id','childrens.memberID','childrens.firstName',
        'childrens.lastName','members.photo','childrens.photo')
        ->where('members.memberID','=',$id)
        ->get();
        return view('board/boardViewDetails',['family'=>$data]); 
        // $data=Member::find($id)->first();
   
        
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
    public function sendNotification(Request $request){
        $member = Member::all();
         
        $project = [
            'greeting' => $request->greeting,',',
            'body' => $request->body,
            'thanks' => $request->thanks,
            'actionText' => 'View Project',
            'actionURL' => url('/'),
           
        ];
  
        FacadsNotification::send($member, new EmailNotification($project));
   
       return redirect()->back()->with('success','the notification send');

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
      $renew=Member::where('status','renewed')->count();
      $staff=DB::table('staff')->count();
      
      $notrenew=Member::where('status','not_renewed')->count();
      $treatedINdividuals=DB::table('register_threated_individuals')->count();
      $collection=[
        'staff'=>$staff,
        'clinics'=>$clinics,
        'treatedINdividuals'=>$treatedINdividuals,
        'members'=>$members,
        'renew'=>$renew,
        'notrenew'=>$notrenew,

      ];
    //   return DB::table('members')->count();
   // return view('admin/adminDashBoard');
   //'memberpage/memberDashBoard'
       return view('board/boardDashBoard',$collection);
    
    }
}
