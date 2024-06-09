<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/sideBar.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
   <div>
      <div class="wellcome">
            <div style="width: 30%;">
                <img class="logo" src="/assets/logo.jpg" alt="LOGO" height="80px" width="80px">
            </div >
            <center>
                <h1>{{__('field.header')}}</h1>
            </center>
         </div>
    </div> 
      <div style='margin-top:82px;'>
      <div style='float:left;'>
        <input type="checkbox" class='toggle' name='' id='check'>
          <!-- <img src="../assets/logo.jpg"  width="50px" alt="logo is no available" /> -->
            <div class='container1'>
              <label for="ckeck">
                   <span class='fas fa-times' id='times'></span>
                   <span class='fas fa-bars' id='bars'></span>
              </label>
              <div class='head'>{{__('field.menu')}}</div>
               <ol>
               <li> <a href="{{url('/financeOfficer') }}" class="{{'financeOfficer'==request()->path()? 'active1':''}}">{{__('field.DashBoard')}}</a></li>
                  <li> <a href="{{url('/registerPayment') }}" class="{{'registerPayment'==request()->path()? 'active1':''}}">{{__('field.registerpayment')}} </a></li>
                  <li> <a href="{{ url('/viewCashin') }}" class="{{'viewCashin'==request()->path()? 'active1':''}}">{{__('field.viewMembersPayment')}}  </a></li>
                  <li> <a href="{{ url('/viewCashout') }}" class="{{'viewCashout'==request()->path()? 'active1':''}}">{{__('field.viewcashout')}} </a></li>
                  <li> <a href="{{url('/cashinfromfinance') }}" class="{{'generateReport'==request()->path()? 'active1':''}}">{{__('field.paymentRegisteredByF')}} </a></li>
                  <!-- <li> <a href="{{url('/financeViewNotification') }}" class="{{'financeViewNotification'==request()->path()? 'active1':''}}" >{{__('field.viewnotification')}} </a></li> -->
                  <li lass='link'><a href="{{ url('/fviewBankAcount') }}" class="{{'fviewBankAcount'==request()->path()? 'active1':''}}">{{__('field.viewBankAcount')}}</a></li>

               </ol>
            </div>
     </div>
     <div class='navAndMain'>
     <div class='topNav'>
              <div style="width:10%">
              <a style="margin-left:4px; float:left" href="/"> <i class='fas fa-home' style='font-size:48px;color:blue'></i></a>
              </div>
            <div style="width:50%; text-align:center">
                  <h3 >{{__('field.financeOfficerHeader')}}</h3>
              </div>
              <div class="logout" >
                  <a href="{{url('/logout')}}" >{{__('navbar.logout')}}</a>
              </div>
              </div>
              <div class='displayBody'>
                   @yield('content')
              </div>
        </div>
     </div>
   </div>
</body>
</html>






