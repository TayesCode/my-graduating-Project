<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Staff;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification as FacadsNotification;
class NotificationPractice extends Controller
{
    public function send(Request $request) 
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
   
        dd('Notification sent!');
    }
}

