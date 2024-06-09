@extends('admin/adminHomepage')
@section('content')
    <head>
        <link rel="stylesheet" href="css/inputForm.css">
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
            <h4>{{__('field.registerStaffHeader')}}</h4><hr>
            <form action="{{url('/acountCreate')}}"  method='post' enctype="multipart/form-data">
            @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif    
    
            @csrf
            <div>

                    <div class="bodyleft">

                    <label for="employeeID">{{__('field.employeeID')}}</label><br>
                        <input type="text" id="employeeID" name="employeeID" placeholder="enter id of the employee.."><br>
                        <span style='color:red'>@error('employeeID'){{$message}}@enderror</span><br>

                        <label for="fname">{{__('field.fName')}}</label><br>
                        <input type="text" id="fname" name="fName" placeholder="enter first name of the employee.."><br>
                        <span style='color:red'>@error('fName'){{$message}}@enderror</span><br>
                        <label for="mname">{{__('field.mName')}}</label><br>
                        <input type="text" id="mname" name="mName" placeholder="enter second name of the employee.."><br>
                        <span style='color:red'>@error('mName'){{$message}}@enderror</span><br>

                        <label for="lname">{{__('field.lName')}}</label><br>
                        <input type="text" id="lname" name="lName" placeholder="enter last name of employe .."><br>
                        <span style='color:red'>@error('lName'){{$message}}@enderror</span><br>

                        <label for="dateofbirth">{{__('field.dateOfBirth')}}</label><br>
                        <input type="date" id="DOB" name="dateofbirth"
                            placeholder="enter date of birth of employe.." ><br>
                            <span style='color:red'>@error('dateofbirth'){{$message}}@enderror</span><br>

                            <label style="padding: 6px">{{__('field.gender')}}</label><br>
                        <input type="radio" value="Male" name="gender" checked> <label>{{__('field.wond')}}</label>
                        <input type="radio" value="Female" name="gender"><label>{{__('field.set')}}</label><br>
                        <label for="Email">{{__('field.email')}}</label><br>
                        <input type="text" id="email" name="email" placeholder="enter email of the employe.."><br>
                        <span style='color:red'>@error('email'){{$message}}@enderror</span><br>

                        <label for="region">{{__('field.region')}}</label><br>
                        <input type="text" id="adress" name="region" placeholder="enter address of the employe.."><br>
                        <span style='color:red'>@error('region'){{$message}}@enderror</span><br>

                            <label for="Address">{{__('field.zone')}}</label><br>
                        <input type="text" id="adress" name="zone" placeholder="enter address of the employe.."><br>
                        <span style='color:red'>@error('zone'){{$message}}@enderror</span><br>

                            <label for="woreda">{{__('field.woreda')}}</label><br>
                        <input type="text" id="adress" name="woreda" placeholder="enter address of the employe.."><br>
                        <span style='color:red'>@error('woreda'){{$message}}@enderror</span><br>


                    </div>
                    <div class="bodyright">
                    <label for="Address">{{__('field.kebele')}}</label><br>
                        <input type="text" id="adress" name="kebele" placeholder="enter address of the employe.."><br>
                        <span style='color:red'>@error('kebele'){{$message}}@enderror</span><br>

                        <label for="phone">{{__('field.phone')}}</label><br>
                        <input type="tel" id="phone" name="phone"
                             placeholder="enter mobile number of the employe.."> <br>
                             <span style='color:red'>@error('phone'){{$message}}@enderror</span><br>

                        <label for="profession">{{__('field.professionType')}}</label><br>
                        <input type="text" id="profession" name="profession"
                            placeholder="enter the profession of the employe.. "> <br>
                            <span style='color:red'>@error('profession'){{$message}}@enderror</span><br>

                        <label for="Education level">{{__('field.educationalLevel')}}</label><br>
                        <select id="educationlevel" name="educationlevel">
                            <option value="masters">{{__('field.master')}}</option>
                            <option value="degree">{{__('field.degree')}}</option>
                            <option value="TVET">{{__('field.TVET')}}</option>
                            <option value="deploma">{{__('field.deploma')}}</option>
                            <option value="PHD">{{__('field.phd')}}</option>
                        </select><br>

                        <label for="username">{{__('field.userName')}}</label><br>
                        <input type="text" id="username" name="userName"
                            placeholder="enter the user name of the employe.."> <br>
                            <span style='color:red'>@error('userName'){{$message}}@enderror</span><br>

                        <label for="password">{{__('field.password')}}</label><br>
                        <input type="password" id="password" name="password"
                            placeholder="{{__('field.password')}}" ><br>
                            <span style='color:red'>@error('password'){{$message}}@enderror</span><br>

                        <label for="role">{{__('field.role')}}</label><br>
                        <select id="role" name="role">
                            <option value="board">{{__('field.board')}}</option>
                            <option value="financeOfficer">{{__('field.financeOfficer')}}</option>
                            <option value="cardOfficer">{{__('field.cardOfficer')}}</option>
                            <option value="healthExtension">{{__('field.healthExtension')}}</option>
                            <option value="clinicalAuditor">{{__('field.clinicalAuditor')}}</option>
                            <option value="admin">{{__('field.admin')}}</option>
                          </select><br>
                        <span style='color:red'>@error('role'){{$message}}@enderror</span><br>

                        <label for="schemeID">{{__('field.schemeID')}}</label><br>
                        <input type="text" id="adress" name="schemeID" placeholder="enter the id of the organization.."><br>
                        <span style='color:red'>@error('schemeID'){{$message}}@enderror</span><br>

            <label for="photo">{{__('field.upload')}}</label><br>
            <input type="file" id="photo" name="photo"><br>
            <span style='color:red'>@error('photo'){{$message}}@enderror</span><br>
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