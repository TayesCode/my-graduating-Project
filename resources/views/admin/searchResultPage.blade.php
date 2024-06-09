@extends('admin/adminHomepage')
@section('content')
    <head>
        <link rel="stylesheet" href="../css/layout.css">
        <link rel="stylesheet" href="../css/inputForm.css">
        {{-- <style>
* {
  box-sizing: border-box;
}

input[type=text],select,tel {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=tel] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  padding-left:24px;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
#submit{
padding-left:200px;
}
input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width:50%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */ --}}
        <style>
          .buttonContainer{
            margin-bottom: 20px;
          }
            @media screen and (max-width: 600px) {
                .bodyleft,.bodyright
                input[type=text] {
                    width: 100%;
                    margin-top: 0;
                }
            }
        </style>
    </head>

    <body>
      <div style="padding: 20px">
        <div class="container">
            <h4>{{__('field.editStaffAcount')}}</h4><hr>
            @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif
            <form action="{{url('/updateAcount')}}" method='post'>
               
            @csrf
            <div>

                    <div class="bodyleft">
                        <input type='hidden' name='employeeID' value='{{$staff->employeeID}}'>
                        <label for="fname">{{__('field.fName')}}</label><br>
                        <input type="text" id="fname" name="fName" value='{{$staff->firstName}}' 
                            ><br>
                        <label for="lname">{{__('field.lName')}}</label><br>
                        <input type="text" id="lname" name="lName" value='{{$staff->lastName}}'
                            ><br>
                        <label for="dateofbirth">{{__('field.dateOfBirth')}}</label><br>
                         <input type="date" id="DOB" name="dateofbirth" value='{{$staff->dateOfBirth}}'><br>
                           <!-- <label style="padding: 6px">Gender :</label><br> -->
                        <input type="hidden"  name="gender" value ='{{$staff->gender}}'> 
                        <!-- <input type="radio" value="Female" name="gender" value='{{$staff->gender}}'>-->
                        <label for="Email">{{__('field.email')}}</label><br>
                        <input type="text" id="email" name="email" value='{{$staff->email}}'><br>
                        <label for="region">{{__('field.region')}}</label><br>
                        <input type="text" id="region" name="region" value='{{$staff->region}}'><br>
                            <label for="zone">{{__('field.zone')}}</label><br>
                        <input type="text" id="zone" name="zone" value='{{$staff->zone}}'><br>
                            <label for="woreda">{{__('field.woreda')}}</label><br>
                        <input type="text" id="woreda" name="woreda" value='{{$staff->woreda}}'><br>

                    </div>
                    <div class="bodyright">
                    <label for="kebele">{{__('field.kebele')}}</label><br>
                        <input type="text" id="kebele" name="kebele" value='{{$staff->kebele}}'><br>
                        <label for="phone">phone</label><br>
                        <input type="tel" id="phone" name="phone"
                             value='{{$staff->phone}}'> <br>
                        <label for="profession">{{__('field.professionType')}}</label><br>
                        <input type="text" id="profession" name="profession"
                            value='{{$staff->profession}}'> <br>
                        <label for="Education level">{{__('field.educationalLevel')}}</label><br>
                        <select id="educationlevel" name="educationlevel" selected='{{$staff->levelOfEducation}}'>
                            <option value="masters" >{{__('field.master')}}</option>
                            <option value="degree">{{__('field.degree')}}</option>
                            <option value="TVET">{{__('field.TVET')}}</option>
                            <option value="deploma">{{__('field.deploma')}}</option>
                            <option value="PHD">{{__('field.phd')}}</option>
                        </select><br>
                        <label for="username">{{__('field.userName')}}</label><br>
                        <input type="text" id="username" name="userName"
                            value='{{$staff->userName}}'> <br>
                        <label for="password">{{__('field.password')}}</label><br>
                        <input type="password" id="password" name="password"
                            value='{{$staff->password}}'><br>
                        <label for="role">{{__('field.role')}}</label><br>
                        <select id="role" name="role" selected='{{$staff->role}}'>
                            <option value="board" >{{__('field.board')}}</option>
                            <option value="financeOfficer">{{__('field.financeOfficer')}}</option>
                            <option value="cardOfficer">{{__('field.cardOfficer')}}</option>
                            <option value="healthExtension">{{__('field.healthExtension')}}</option>
                            <option value="clinicalAuditor">{{__('field.clinicalAuditor')}}</option>
                        </select><br>
                        <!-- <label for="schemeID">Scheme ID</label><br> -->
                        <input type="hidden" id="schemeID" name="schemeID" value='{{$staff->schemeID}}'><br>
                    </div>
                </div>
                <div class="buttonContainer">
                  <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}">
                  <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
                </div>
            </form>
        </div>
      </div>
    </body>
@endsection