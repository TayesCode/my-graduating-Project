@extends('healthEx/healthExtensionHome')
@section('content')
<link rel="stylesheet" href="../css/inputForm.css">

<body>
    <div style="padding: 20px">
    <div class="container">
        <center>  <h3 style="color:rgb(19, 112, 252)">{{__('field.familyRegisterPage')}} </h3> </center><hr>
        <form action="{{url('/childrenRegister')}}" method='post' enctype="multipart/form-data">
        @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif  
        @csrf
          <div class="smallSize" style="margin-left: 40px">
            <label for="memberID">{{__('field.memberID')}} </label><br>
            <input type="text" id="memberID" name="memberID"  ><br>
            <span style='color:red'>@error('memberID'){{$message}}@enderror</span><br>

            <label for="fname">{{__('field.fName')}} </label><br>
            <input type="text" id="fname" name="fName" ><br>
            <span style='color:red'>@error('fName'){{$message}}@enderror</span><br>

            <label for="mName">{{__('field.mName')}} </label><br>
            <input type="text" id="mName" name="mName"  ><br>
            <span style='color:red'>@error('mName'){{$message}}@enderror</span><br>

            <label for="lname">{{__('field.lName')}} </label><br>     
            <input type="text" id="lname" name="lName" ><br>
            <span style='color:red'>@error('lName'){{$message}}@enderror</span><br>

            <label for="age">{{__('field.dateOfBirth')}} </label><br>
            <input type="date" id="age" name="dateOfBirth"  ><br>
            <span style='color:red'>@error('dateOfBirth'){{$message}}@enderror</span><br>

            <label for="disability">{{__('field.disability')}} </label><br>
            <select id="disablity" name="disablity" >
             <option value="normal">{{__('field.normal')}} </option>
             <option value="disable">{{__('field.disable')}} </option>
            </select><br>
            <span style='color:red'>@error('status'){{$message}}@enderror</span><br>

            <label style="padding: 6px">{{__('field.gender')}} </label><br>
            <input type="radio" value="Male" name="gender" checked > <label>{{__('field.wond')}} </label>
            <input type="radio" value="Female" name="gender"><label>{{__('field.set')}} </label><br>
            <label for="photo">{{__('field.upload')}} </label><br>
            <input type="file" id="photo" name="photo"><br>
            <span style='color:red'>@error('photo'){{$message}}@enderror</span><br>

          </div>
          <div class="buttonContainer">
            <button type="reset" value="Submit" class="btn btn-danger">{{__('field.reset')}} </button><br>
            <button type="submit" value="Submit" class="btn btn-primary">{{__('field.register')}} </button><br>
          </div>
        </form>
      </div>
    </div>
</body>
@endsection