@extends('financeOfficer.financeOfficerHomepage')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/inputForm.css">
<link rel="stylesheet" href="css/layout.css">
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
            <h4>Welcome to the generate report page</h4><hr>
            <div style="padding: 30px">
                <form class="example" action="">
                    <label for="search"> input the the generation criteria</label><br>
                    <input type="text" placeholder="Search.." name="search" class='input 5rem'>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection