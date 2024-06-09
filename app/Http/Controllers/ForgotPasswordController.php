<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 
use App\Models\Staff;

use App\Notifications\EmailNotification;
use App\Models\Member;
use Illuminate\Support\Facades\Notification as FacadsNotification;

class ForgotPasswordController extends Controller
{
  public function getEmail()
  {

     return view('customauth.passwords.email');
  }
public function getPasswordReset(){
  return view('customauth.passwords.reset');
}
 public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:staff',
    ]);
    $member = Member::find($request->email);
         
    
    $token = str_random(64);
      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );
      Mail::send('customauth.passwords.reset', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }
  
}