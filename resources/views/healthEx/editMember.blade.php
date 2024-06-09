@extends('healthEx.healthExtensionHome')
@section('content')

<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/layout.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/sideBar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/navBar.css')}}">


<link rel="stylesheet" type='text/css' href="{{asset('css/inputForm.css')}}">
    <form method='post' action="{{url('/updatemember')}}" enctype="multipart/form-data">
    @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif    
    @csrf
        <div style="padding: 30px">
            <div class="container">
                <center>
                    <h3 style="color:rgb(19, 112, 252)">{{__('field.registerMemberForm')}}</h3>
                </center>
                <hr>
                <div>
                    <div class="bodyleft">
                    <label> {{__('field.memberID')}} </label><br>

                        <input type="text" name="memberID" value='{{$data->memberID}}' /> <br>
                        <label> {{__('field.fName')}}  </label><br>
                        <input type="text" name="fName" value='{{$data->firstName}}' /> <br>
                        <label> {{__('field.mName')}}  </label><br>
                        <input type="text" name="mName" value='{{$data->middleName}}' /> <br>
                        <label>{{__('field.lName')}} </label><br>
                        <input type="text" name="lName" value='{{$data->lastName}}' /> <br>
                        <label style="padding: 6px">{{__('field.gender')}} </label><br>
                        <input type="radio" value="Male" name="gender" value='{{$data->gender}}' checked> <label>{{__('field.wond')}} </label>
                        <input type="radio" value="Female" name="gender" value='{{$data->gender}}'><label>{{__('field.set')}} </label><br>
                        <label for="dateofbirth">{{__('field.dateOfBirth')}} </label><br>
                        <input type="date" id="DOB" name="dateOfBirth"
                        value='{{$data->dateOfBirth}}'><br>
                        <label> {{__('field.phone')}} </label><br>
                        <input type="text" name="phone" value='{{$data->phone}}'><br>
                        <label> {{__('field.status')}} </label><br>
                        <input type="text" name="status" value='{{$data->status}}'><br>
                        <label for="email"><b>{{__('field.email')}} </b></label><br>
                        <input type="email" value='{{$data->email}}' name="email" required><br>
                        <label for="occopotion"><b>{{__('field.occopation')}} </b></label><br>
                        <input type="text" value='{{$data->occopation}}' name="occopation" required><br>
                    </div>
                    <div class="bodyright">
                    
                        <label>{{__('field.region')}}  </label><br>
                        <input type="text" value='{{$data->region}}' name="region" required><br>

                        <label>{{__('field.zone')}}  </label><br>
                        <input type="text" value='{{$data->zone}}' name="zone" required><br>
                        <label>{{__('field.woreda')}}  </label><br>
                        <input type="text" value='{{$data->woreda}}' name="woreda" required><br>
                        <label>{{__('field.kebele')}} </label><br>
                        <input type="text" value='{{$data->kebele}}' name="kebele" required><br>
                        <label for="psw"><b>{{__('field.userName')}} </b></label><br>
                        <input type="text" value='{{$data->userName}}' name="userName" required><br>
                        <label for="psw"><b>{{__('field.password')}} </b></label><br>
                        <input type="password" value='{{$data->password}}' name="password" required><br>
                        <label for="photo">{{__('field.upload')}} </label><br>
                        <input type="file" id="photo" name="photo" value='{{$data->photo}}'><br>
                    </div>
                    <div class="buttonContainer">
                        <button type="submit" class="btn btn-primary"> {{__('field.update')}} </button>
                        <button type='reset' class='btn btn-danger'>{{__('field.reset')}} </button>
                    </div>
                </div>
            </div>
    </form>
@endsection