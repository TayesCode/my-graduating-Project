<?php 

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff; 
use App\Models\Member;
use App\Models\AdminAcount;

class ResetPasswordController extends Controller { 

  public function getPassword($token) { 

     return view('customauth.passwords.reset', ['token' => $token]);
  }

  public function updatePassword(Request $request)
  {

  $request->validate([
      'email' => 'required|email|exists:staff|exists:admin_acounts',
      'password' => 'required|min:4|confirmed',
      'password_confirmation' => 'required|same:password|min:4',

  ]);

  // $updatePassword = DB::table('password_resets')
  //                     ->where(['email' => $request->email, 'token' => $request->token])
  //                     ->first();
  $staff=Staff::where('email','=',$request->email)->first();
  $member=Member::where('email','=',$request->email)->first();
  $admin=AdminAcount::where('email','=',$request->email)->first();
  
  if($staff||$member||$admin){
   if($staff){
   $staff->password=Hash::make($request->password);
   $staff->save();
   return redirect('/login')->with('message', 'Your password has been changed!');
  }
   if($member){
    $member->password=Hash::make($request->password);
    $member->save();
    return redirect('/login')->with('message', 'Your password has been changed!');

   }
   if($admin){
    $admin->password=Hash::make($request->password);
    $admin->save();
    return redirect('/login')->with('message', 'Your password has been changed!');


   }
  }
  else{
    return redirect()->with('fail', 'Your password has not been changed!');
  }

  // if(!$updatePassword)
  //     return back()->withInput()->with('error', 'Invalid token!');

  //   $user = Staff::where('email', $request->email)
  //               ->update(['password' => Hash::make($request->password)]);

  //  // DB::table('password_resets')->where(['email'=> $request->email])->delete();

  //   return redirect('/login')->with('message', 'Your password has been changed!');

   }
}