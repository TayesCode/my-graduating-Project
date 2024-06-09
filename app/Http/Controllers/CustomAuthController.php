<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Member;
use App\Models\AdminAcount;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
      if(Session::has('loginEmail')){
        $email=Session()->get('loginEmail');
        $staff=Staff::where('email','=',$email)->first();
        $member=Member::where('email','=',$email)->first();
        $admin=AdminAcount::where('email','=',$email)->first();
       if($staff||$member||$admin){
        if($staff){
          $role=$staff->role;
          if($role=='board'){
            return redirect('/board');
           }
           if($role=='healthExtension'){
            return redirect('/extension');
           }
           if($role=='clinicalAuditor'){
            return redirect('/auditor');
           }
           if($role=='financeOfficer'){
            return redirect('/financeOfficer');
           }
           if($role=='cardOfficer'){
            return redirect('/cardOfficer');
           }
           if($role=='admin'){
            return redirect('/admin');
           }
        }
        if($member){
          return redirect('/member');
        }
        if($admin){
          return redirect('/admin');
        }
       }
      

      }
      else{ }
        return view('auth.login');

     
    }
    public function register(){
        return view('auth.register');
    }
    public function loginUser(Request $request){

        $staff=Staff::where('email','=',$request->email)->first();
        $member=Member::where('email','=',$request->email)->first();
        $admin=AdminAcount::where('email','=',$request->email)->first();
        if($staff||$member||$admin){
            if($staff){
              

              if(Hash::check($request->password, $staff->password)){ 
                $role=$staff->role;               
                $request->session()->put('loginEmail',$staff->email);
                $email2=$request->session()->get('loginEmail');
               if($role=='board'){
                return redirect('/board');
               }
               if($role=='healthExtension'){
                return redirect('/extension');
               }
               if($role=='clinicalAuditor'){
                return redirect('/auditor');
               }
               if($role=='financeOfficer'){
                return redirect('/financeOfficer');
               }
               if($role=='cardOfficer'){
                return redirect('/cardOfficer');
               }
               //
               if($role=='admin'){
                return redirect('/admin');
               }
        //
               }
               else{
                return back()->with('fail','password is not correct');
               } 
            }
           else if($member){

            if(Hash::check($request->password, $member->password)){
             
               $request->session()->put('loginEmail',$member->email);
               $email2=$request->session()->get('loginEmail');
               return  redirect('/member');
       
                }
              else{
               return back()->with('fail','password is not correct');
              } 
            }
            //admin
            else if($admin){

                if(($admin->password==$request->password)){
              
                $request->session()->put('loginEmail',$admin->email);
                $email2=$request->session()->get('loginEmail');
                return  redirect('/admin');
        
                 }
               else{
                return back()->with('fail','password is not correct');
               } 
             }
            
    }
        else{
            return back()->with('fail'," email is not registered") ;
          }

         
        //    return redirect('/extension');
        
       
          }
           
public function logOut( Request $request){
    // if(Session::has('loginEmail')){
    //   $request->session()->flush();
    //   return redirect('/login');

    // }
    $request->session()->flush();
    return redirect('/login');
}

        } 
       
    
    

