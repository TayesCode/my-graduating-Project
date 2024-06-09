@extends('healthEx/healthExtensionHome')
@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
    <style>
    </style>
</head>
<body>
    <div style="padding: 20px">
        <div class="container">
            <center>
            <div class="dashBoard">
                <div class="dashBoardCard" style="margin-top: 0px">
                    <div>
                        <center> <i class='fas fa-users' style='font-size:100px;color:rgb(136, 20, 139)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfMember')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$total}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:rgb(208, 255, 0)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfRenew')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$renew}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-times' style='font-size:100px;color:rgba(238, 71, 71, 0.651)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfUnrenew')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$unrenew}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfRequest')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$totalrequests}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-check' style='font-size:100px;color:green'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfMember')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$total}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfMember')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$total}}</h1>
                    </div>
                  </div>
               </div>
        </div>
    </div>
</body>
@endsection