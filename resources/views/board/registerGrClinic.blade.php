@extends('board/boardHomepage')

@section('content')
<head>
<link rel="stylesheet" type='text/css' href="{{asset('css/inputForm.css')}}">
<link rel="stylesheet" href="../css/inputForm.css">
</head>
<body>
              <form action="{{url('/registerGClinic')}}" method ='post'>
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
                    <h3 style="color:rgb(19, 112, 252)">{{__('field.registerClinicHeader')}}</h3>
                </center>
                <hr>
                <div>
                    <div class="bodyleft">    
                    <label for="G-ClinicID">{{__('field.clinicID')}} required</label><br>
                    <input type="text" name="G-ClinicID" placeholder="G-ClinicID" size="15"  /> <br>
                        <span style='color:red'>@error('G-ClinicID'){{$message}}@enderror</span><br>       
          
                            <label for="name">{{__('field.name')}}</label><br>
                            <input type="text" name="name"  /> <br>
                        <span style='color:red'>@error('name'){{$message}}@enderror</span><br>       
                              <label for="region">{{__('field.region')}}</label><br>
                              <input type="text" name="region"  /> <br>
                        <span style='color:red'>@error('region'){{$message}}@enderror</span><br>  
                        
                              <label for="zone">{{__('field.zone')}}</label><br>
                              <input type="text" name="zone"  /> <br>
                        <span style='color:red'>@error('zone'){{$message}}@enderror</span><br> 

                              
                          
                              <label for="woreda">{{__('field.woreda')}}</label><br>
                              <input type="text" name="woreda"  /> <br>
                        <span style='color:red'>@error('woreda'){{$message}}@enderror</span><br>  
      
                              <label for="services">{{__('field.services')}}</label><br>
                              <input type="text" name="services"  /> <br>
                        <span style='color:red'>@error('services'){{$message}}@enderror</span><br>  
</div>
                         <div class="bodyright">
                              <label for="fax">{{__('field.fax')}}</label><br>
                              <input type="text" name="fax"   /> <br>
                        <span style='color:red'>@error('fax'){{$message}}@enderror</span><br> 
                              <label for="postalcode">{{__('field.postalCode')}}</label><br>
                              <input type="text" name="postalCode"   /> <br>
                        <span style='color:red'>@error('postalCode'){{$message}}@enderror</span><br>  
                          
                              <label for="email">{{__('field.email')}}</label><br>
                              <input type="text" name="email"  /> <br>
                        <span style='color:red'>@error('email'){{$message}}@enderror</span><br> 
                              <label for="officetelephone">{{__('field.officeTelephone')}}</label><br>
                              <input type="text" name="officeTelephone"   /> <br>
                        <span style='color:red'>@error('officeTelephone'){{$message}}@enderror</span><br>  
                  
                              <!-- <label for="staffID">{{__('field.employeeID')}}</label>
                              <input type="text" name="saffID"   /> <br>
                        <span style='color:red'>@error('staffID'){{$message}}@enderror</span><br>  -->
                              <label for="accountID">{{__('field.acountID')}}</label><br>
                              <input type="text" name="accountID"  /> <br>
                        <span style='color:red'>@error('accountID'){{$message}}@enderror</span><br> 
                        </div> 
                        <div class="buttonContainer" id="button">
                            <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}">
                            <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
                        </div>
            
          </div>
         </div>
</div>
              </form>
        <!-- </div>
    </div> -->
</body>
@endsection