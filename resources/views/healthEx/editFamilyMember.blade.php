@extends('healthEx/healthExtensionHome')
@section('content')
<!-- <link rel="stylesheet" href="../css/inputForm.css">
<link rel="stylesheet" href="../css/layout.css"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/sideBar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/navBar.css')}}">
<link rel="stylesheet" type='text/css' href="{{asset('css/inputForm.css')}}">
<body>
    <div style="padding: 20px">
    <div class="container">
        <center>  <h3 style="color:rgb(19, 112, 252)">{{__('field.familyRegisterPage')}}</h3> </center><hr>
        <form action="{{url('/updateChildren')}}" method='post' enctype="multipart/form-data">
        @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif      
        @csrf
          <div class="smallSize" style="margin-left: 40px">
            <input type="hidden" name='id' value='{{$data->Id}}'>
            <label for="memberID">{{__('field.memberID')}}</label><br>
            <input type="text" id="memberID" name="memberID" value='{{$data->memberID}}'><br>
            <label for="fname">{{__('field.fName')}}</label><br>
            <input type="text" id="fname" name="fName" value='{{$data->firstName}}'><br>
            <label for="mName">{{__('field.mName')}}</label><br>
            <input type="text" id="mName" name="mName" value='{{$data->middleName}}'><br>
            <label for="lname">{{__('field.lName')}}</label><br>     
            <input type="text" id="lname" name="lName" value='{{$data->lastName}}'><br>
            <label for="age">{{__('field.dateOfBirth')}}</label><br>
            <input type="date" id="age" name="dateOfBirth" value='{{$data->dateOfBirth}}'><br>
            <br>
            <label style="padding: 6px">{{__('field.gender')}}</label><br>
            <input type="radio" value="Male" name="gender" > <label>{{__('field.wond')}}</label>
            <input type="radio" value="Female" name="gender"><label>{{__('field.set')}}</label>
            <br>
            <label>{{__('field.status')}}</label>
            <select id="disablity" name="disablity" value='{{$data->status}}' >
             <option value="normal">{{__('field.normal')}}</option>
             <option value="disable">{{__('field.disable')}}</option>
            </select><br>
            <!-- <label style="padding: 6px">Gender :</label><br>
            <input type="radio" value="Male" name="gender" checked > <label>Male</label>
            <input type="radio" value="Female" name="gender"><label>Female</label>
            <input type="radio" value="Other" name="gender"><label> Other</label><br> -->
            <label for="photo">{{__('field.upload')}}</label><br>
            <input type="file" id="photo" name="photo"><br>
          </div>
          <div class="buttonContainer">
            <button type="reset" value="Submit" class="btn btn-danger">{{__('field.reset')}}</button><br>
            <button type="submit" value="Submit" class="btn btn-primary">{{__('field.update')}}</button><br>
          </div>
        </form>
      </div>
    </div>
</body>
@endsection