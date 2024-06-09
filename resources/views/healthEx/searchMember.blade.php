@extends('healthEx/healthExtensionHome')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/inputForm.css">
<style>
    .container{
        padding-bottom: 80px;
    }
    input[type=text]{
        width: 70%;
    }
</style>
<body>
    <div style="padding: 20px">
        <div class="container">
            <div style="padding: 30px">
                <form class="example" action="{{url('/searchMember')}}" method='post'>
                @if(Session::has('success'))
             <div class='alert alert-success'>{{Session::get('success')}}</div>
              @endif
             @if(Session::has('fail'))
              <div class='alert alert-danger'>{{Session::get('fail')}}</div>
             @endif 
                    @csrf
                    <label for="search"> {{__('field.searchByID')}}</label><br>
                    <span style='color:red'>@error('search'){{$message}}@enderror</span><br>
                    <input type="text"  name="search" class='input 5rem'>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection