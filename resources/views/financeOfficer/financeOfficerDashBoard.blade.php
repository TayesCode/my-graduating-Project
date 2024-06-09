@extends('financeOfficer/financeOfficerHomepage')
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
                        <label for="">{{__('field.numberOfPaymentsF')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$payments}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:rgb(208, 255, 0)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfPaymentFromMember')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$memberpayments}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-times' style='font-size:100px;color:rgba(238, 71, 71, 0.651)'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfCashIn')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$cashin}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfCashOut')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$cashout}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-user-check' style='font-size:100px;color:green'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfPaymentForRegister')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$register}}</h1>
                    </div>
                  </div>
                  <div class="dashBoardCard">
                    <div>
                        <center> <i class='fas fa-bell' style='font-size:100px;color:red'></i></center>
                    </div>
                    <div>
                        <label for="">{{__('field.numberOfPaymentForRenewal')}}</label>
                    </div>
                    <div>
                        <h1 style="color: blue">{{$renewal}}</h1>
                    </div>
                  </div>
               </div>
        </div>
    </div>
</body>
@endsection