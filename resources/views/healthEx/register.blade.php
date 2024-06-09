@extends('healthEx.healthExtensionHome')
@section('content')
<link rel="stylesheet" href="css/inputForm.css">
    <form method='post' action="{{url('/registerMember')}}" enctype="multipart/form-data">
                  @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif    
    @csrf
      <div class="container">
        <div style="padding: 20px">
            <!-- <div class="container"> -->
                <center>
                    <h4 >{{__('field.registerMemberForm')}}</h4>
                </center>
                <hr>
                <div>
                    <div class="bodyleft">
                    <label> {{__('field.memberID')}}</label><br>
                        <input type="text" name="memberID"  size="15"  /> <br>
                        <span style='color:red'>@error('memberID'){{$message}}@enderror</span><br>
                        <label> {{__('field.fName')}} </label><br>
                        <input type="text" name="fName"  /> <br>
                        <span style='color:red'>@error('fName'){{$message}}@enderror</span><br>
                        <label> {{__('field.mName')}} </label><br>
                        <input type="text" name="mName"  size="15" /> <br>
                        <span style='color:red'>@error('mName'){{$message}}@enderror</span><br>
                        <label> {{__('field.lName')}} </label><br>
                        <input type="text" name="lName"  size="15" /> <br>
                        <span style='color:red'>@error('lName'){{$message}}@enderror</span><br>
                        <label style="padding: 6px">{{__('field.gender')}}</label><br>
                        <input type="radio" value="Male" name="gender" checked> <label>{{__('field.wond')}}</label>
                        <input type="radio" value="Female" name="gender"><label>{{__('field.set')}}</label><br>
                        <label for="dateofbirth">{{__('field.dateOfBirth')}}</label><br>
                        <input type="date" id="DOB" name="dateOfBirth"><br>
                        <span style='color:red'>@error('dateOfBirth'){{$message}}@enderror</span><br>
                        <label> {{__('field.phone')}}</label><br>
                        <input type="text" name="phone"  size="10"><br>
                        <span style='color:red'>@error('phone'){{$message}}@enderror</span><br>
                
                        <label> {{__('field.status')}}</label><br>
                        <select name="status" id="">
                            <option value="renewed">{{__('field.renewed')}}</option>
                            <option value="not_renewed">{{__('field.notRenewed')}}</option>
                        </select>
                        <span style='color:red'>@error('status'){{$message}}@enderror</span><br>
                        <label for="email"><b>{{__('field.email')}}</b></label><br>
                        <input type="email" name="email" ><br>
                        <span style='color:red'>@error('email'){{$message}}@enderror</span><br>
                   
                    </div>
                    <div class="bodyright">
                       <label for="occupation"><b>{{__('field.occopation')}}</b></label><br>
                        <input type="text"  name="occopation"><br>
                        <span style='color:red'>@error('occopation'){{$message}}@enderror</span><br>

                        <label>{{__('field.region')}} </label><br>
                        <input type="text"  name="region" ><br>
                        <span style='color:red'>@error('region'){{$message}}@enderror</span><br>

                        <label>{{__('field.zone')}} </label><br>
                        <input type="text"  name="zone" ><br>
                        <span style='color:red'>@error('zone'){{$message}}@enderror</span><br>

                        <label>{{__('field.woreda')}} </label><br>
                        <input type="text"  name="woreda" ><br>
                        <span style='color:red'>@error('woreda'){{$message}}@enderror</span><br>

                        <label>{{__('field.kebele')}}</label><br>
                        <input type="text"  name="kebele" ><br>
                        <span style='color:red'>@error('kebele'){{$message}}@enderror</span><br>

                        <label for="useName"><b>{{__('field.userName')}}</b></label><br>
                        <input type="text" name="userName" ><br>
                        <span style='color:red'>@error('userName'){{$message}}@enderror</span><br>
                        <label for="psw"><b>{{__('field.password')}}</b></label><br>
                        <input type="password"  name="password"><br>
                        <span style='color:red'>@error('password'){{$message}}@enderror</span><br>
                        <label for="photo">{{__('field.upload')}}</label><br>
                        <input type="file" id="photo" name="photo"><br>
                        <span style='color:red'>@error('photo'){{$message}}@enderror</span><br>
                    </div>
                    <div class="buttonContainer">
                        <button type="submit" class="btn btn-primary"> {{__('field.register')}}</button>
                        <button type='reset' class='btn btn-danger'>{{__('field.reset')}}</button>
                        <a href="{{ url('familyMember') }}" class='btn btn-primary'>{{__('field.addMember')}}</a>
                    </div>
                </div>
            </div>
    </form>
@endsection