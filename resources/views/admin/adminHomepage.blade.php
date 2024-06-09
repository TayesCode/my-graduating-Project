<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet"type="text/css" href="css/sideBar.css">
    <title>CBHIS</title>
    <style>
    </style>
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
    <div style="margin-top: 82px">
        <div style="float: left">
        <input class="toggle" type="checkbox" name="" id="check">
        <div class="container1">
            <label for="check">
                <span class="fas fa-times" id="times"></span>
                <span class="fas fa-bars" id="bars"></span>
            </label>
            <div class="head">{{__('field.menu')}}</div>
            <ol>
                <a style="margin-left:10px; float:left; padding-top:8px" href="/home2"> <i class='fas fa-home' style='font-size:28px;color:lightblue'></i></a>
                <li class="link" ><a href="{{ url('/admin') }}">{{__('field.dashBoard')}}</a></li>
                <a style="margin-left:10px; float:left; padding-top:8px " href="/home2"> <i class='fas fa-user' style='font-size:28px;color:lightblue'></i></a>
                <li> <a href="{{ url('/create') }}" class="{{'create'==request()->path()? 'active':''}}">{{__('field.createstaff')}}  </a></li>
                <a style="margin-left:10px; float:left; padding-top:8px" href="/home2"> <i class='fas fa-edit' style='font-size:28px;color:lightblue'></i></a>
                <li><a href="{{url('/toSearch') }}" class="{{'toSearch'==request()->path()? 'active':''}}">{{__('field.search')}} </a></li>
                <a style="margin-left:10px; float:left; padding-top:28px" href="/home2"> <i class='fas fa-paper-plane' style='font-size:28px;color:lightblue'></i></a>
                <li><a href="{{url('/view') }}" class="{{'view'==request()->path()? 'active':''}}">{{__('field.viewstaffaccount')}} </a></li>
                <a style="margin-left:10px; float:left; padding-top:28px" href="/home2"> <i class='fas fa-bell' style='font-size:28px;color:lightblue'></i></a>
                <li><a href="{{url('/adminSendNotification') }}" class="{{'adminSendNotification'==request()->path()? 'active':''}}">{{__('field.sendnotification')}} </a></li>
                {{-- /////////////////////////////// --}}

            </ol>
        </div>
    </div>
        <div class="navAndMain">
            <div class='topNav'>
              <div style="width:20%">
              <a style="margin-left:4px; float:left" href="/"> <i class='fas fa-home' style='font-size:48px;color:blue'></i></a>
              </div>
            <div style="width:40%; text-align:center">
                  <h3 >{{__('field.adminpage')}}</h3>
              </div>
              <div class="logout" >
                  <a href="{{url('/logout')}}" >{{__('navbar.logout')}}</a>
              </div>
              </div>
            <div class="displayBody">
                   @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>