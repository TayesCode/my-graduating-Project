@extends('admin/adminHomepage')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/inputForm.css">
Taye Bdu, [19/08/2022 9:54 ጥዋት]
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
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
            <!-- <h4>Welcome to update page</h4><hr> -->
            <div style="padding: 30px">
                <form class="example" action="{{url('/viewBySearch')}}" method='get'>
                @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif   
                @csrf
                    <label for="search"> {{__('field.searchByID')}}</label><br>
                    <input type="text" placeholder="Search.." name="employeeID" class='input 5rem'>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection