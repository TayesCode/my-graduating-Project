@extends('admin/adminHomepage')
@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
    <style>
    </style>
</head>
<body>
    <div style="padding: 20px">
        <div class="container">
            <!-- <h4>Welcome to send notification</h4><hr> -->
            <center>
            <div class="dashBoard">
                <div class="dashBoardCard" style="margin-top: 0px">
                    <div>
                        <center> <i class='fas fa-users' style='font-size:100px;color:rgb(136, 20, 139)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfCardOfficer')}} </label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$cardOfficer}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-users' style='font-size:100px;color:black'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfMember')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$member}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-times' style='font-size:100px;color:rgba(238, 71, 71, 0.651)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfStaff')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$totalstaff}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-users' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfHealthExtension')}} </label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$healthExtension}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-check' style='font-size:100px;color:green'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfBoard')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$board}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfFinanceOfficer')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$financeOfficer}}</h1>
                    </div>
                  </div>
               </div>
        </div>
    </div>
</body>
@endsection