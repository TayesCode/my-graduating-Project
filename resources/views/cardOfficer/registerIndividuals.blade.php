@extends('cardOfficer.cardOfficerHomepage')
@section('content')
<head>
   
    <link rel="stylesheet" href="css/inputForm.css">
  


</head>
<body>
    <div style="padding: 20px">
    <div class="container">
        <h4>{{__('field.treatedIndividual')}} </h4><hr>
        <div style="padding: 30px">
            <form action="{{url('/registertreated')}}" method="post">
            @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif 
              @csrf
            <div class="row">
                  <div class="col-25">
                    <label for="memberID">{{__('field.memberID')}}</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="memberID" name="memberID" ></br>
                    <span style='color:red'>@error('memberID'){{$message}}@enderror</span>

                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">{{__('field.fName')}}</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="fname" name="fName"  ></br>
                    <span style='color:red'>@error('fName'){{$message}}@enderror</span><br>

                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">{{__('field.lName')}}</label>
                  </div>
                  
                  <div class="col-75">
                    <input type="text" id="lname" name="lName"  >
                    <span style='color:red'>@error('lName'){{$message}}@enderror</span><br>

                  </div>
                 
                </div>
                <div class="row">
                    <div class="col-25">
                      <label for="familyID">{{__('field.phone')}}</label>
                    </div>
                    <div class="col-75">
                      <input type="tel" id="phone" name="phone"  ></br>
                      <span style='color:red'>@error('phone'){{$message}}@enderror</span><br>

                    </div>
                  </div>
                
                    <div class="row">
                  <div class="col-25">
                    <label for="Clinic">{{__('field.clinicID')}}</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="clinic" name="clinicID"  ></br>
                    <span style='color:red'>@error('clinicID'){{$message}}@enderror</span><br>

                  </div>
                </div>
                <br>
                <div class="buttonContainer">
                        <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}">
                        <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
                 </div>
                </div>

            </form>
        </div>
      </div>
      <div>
</body>
@endsection