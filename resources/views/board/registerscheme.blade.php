@extends('board/boardHomepage')

@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
</head>
<body>
    <div style="padding: 20px">
        <div class="container">
            <center><h2>{{__('field.schemeRegisterHeader')}}</center><hr>
            <div style="padding: 30px">
              <form  method='post' action="{{url('/insertScheme')}}">
                @csrf
                        
                            <label for="schemeID">{{__('field.schemeID')}}</label><br>

                            <input type="text" id="Name" name="schemeID" ><br>
                            <span style='color:red'>@error('schemeID'){{$message}}@enderror</span><br> 

                         
                              <label for="lname">{{__('field.name')}}</label><br>
                            
                              <input type="text" id="name" name="name" ><br>
                              <span style='color:red'>@error('name'){{$message}}@enderror</span><br> 

          
                              <label for="region">{{__('field.region')}}</label><br>
                          
                              <input type="text" id="region" name="region" ><br>
                              <span style='color:red'>@error('region'){{$message}}@enderror</span><br> 

                              <label for="zone">{{__('field.zone')}} </label><br>
                          
                              <input type="text" id="zone" name="zone" ><br>
                              <span style='color:red'>@error('zone'){{$message}}@enderror</span><br> 

                       
                              <label for="woreda">{{__('field.woreda')}} </label><br>
                          
                              <input type="text" id="woreda" name="woreda" ><br>
                              <span style='color:red'>@error('woreda'){{$message}}@enderror</span><br> 

                              <label for="officetel">{{__('field.officeTelephone')}} </label><br>
                           
                              <input type="tel" id="officetele" name="officetelephone" ><br>
                              <span style='color:red'>@error('officetelephone'){{$message}}@enderror</span><br> 

                           
                              <label for="fax">{{__('field.fax')}} </label><br>
                            
                              <input type="text" id="fax" name="fax" ><br>
                              <span style='color:red'>@error('fax'){{$message}}@enderror</span><br> 

                           
                              <label for="email">{{__('field.email')}} </label><br>
                           
                              <input type="email" id="email" name="email" ><br>
                              <span style='color:red'>@error('email'){{$message}}@enderror</span><br> 

                            
                              <label for="bankAccountID">{{__('field.acountID')}}  </label><br>
                            
                              <input type="text" id="bankaccountID" name="accountID" >
                              <span style='color:red'>@error('accountID'){{$message}}@enderror</span><br> 

                          <div class="buttonContainer" id="button">
                            <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}">
                            <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
                        </div>
              </form>
              </div>
            </div>
    </div>
</body>
@endsection