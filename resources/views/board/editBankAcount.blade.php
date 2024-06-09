@extends('board/boardHomepage')

@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
</head>
<body>
    <div style="padding: 20px">
        <div class="container">
            <center><h2>{{__('field.registerAcountHeader')}}</center><hr>
            <div style="padding: 30px">
              <form  method='post' action="{{url('/insert')}}">
              @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif  
                @csrf
                            <label for="account-id">{{__('field.acountID')}}</label><br>
                                      <input type="text" id="Name" name="accountID" required><br>
                   
                              <label for="lname">{{__('field.acountName')}}</label><br>
                           
                              <input type="text" id="account_name" name="ownerName" required ><br>
                           
                              <label for="Account-number">{{__('field.acountNo')}}</label><br>
                          
                              <input type="text" id="Account-number" name="accountNumber" required><br>
                          
                              <label for="acountType">{{__('field.acountType')}}required</label><br>
                            
                              <input type="text" id="account_type" name="accountType" required><br>
                            
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