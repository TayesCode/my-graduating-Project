@extends('admin.adminHomepage')
@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
</head>
<body>
    <div style="padding: 20px">
        <div class="container">
            <center><h2>{{__('field.sendNotification')}}</center><hr>
            <div style="padding:30px;">
              <form  method='post' action="{{url('/notificationFromAdmin')}}">
              @if(Session::has('success'))
        <div class='alert alert-success'>{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class='alert alert-danger'>{{Session::get('fail')}}</div>
        @endif 
                     @csrf
                         <label for="greeting">{{__('field.greeting')}}</label><br>
                          <input type="text" id="Name" name="greeting" placeholder="{{__('field.greeting')}} " required>  <br> 
                          <label for="body">{{__('field.body')}}</label><br>
                          <textarea type="text" id="name" name="body" column='90' style='height:100px;' ></textarea><br>
                          <label for="thanks">{{__('field.thanks')}}</label><br>
                          <input type="text" id="thanks" name="thanks" placeholder ="{{__('field.thanks')}}" required><br>
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