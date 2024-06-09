@extends('cardOfficer.cardOfficerHomepage')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/inputForm.css">

<body>
    <div style="padding: 20px">
        <div class="container">
            <div style="padding: 30px">
                <form class="example" action="{{url('/responseOfValidation')}}" method='post'>
                    @if(Session::has('succes'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif
                    <label for="search"> {{__('field.searchByID')}}</label><br>
                    @csrf
                              @error('search')
                                    <span class="invalid-feedback" role="alert" style="color:red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <input type="text" placeholder="Search.." name="search" class='input 5rem'>
                    
                               
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection