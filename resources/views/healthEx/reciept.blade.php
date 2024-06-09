@extends('healthEx/healthExtensionHome')
@section('content')

<h4>{{__('field.listOfMember')}}</h4><hr>
<style>
    a{
        margin-left:5px;
        border-radius:20px;
    }
    table{
        font-family:arial,sans-serif;
        border-collapse:collapse;
        width:100%;
        margin:20px;
        border-radius:30px;
    }
    td,th{
        border:1px solid #ddd;
        text-align:left;
        padding:3px;

    }
    tr:nth-child(even){
        background-color:#ddd;
    }
</style>
@if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif 
<table>

<tr > 
    <th>memberID</th>
    <th>firstName</th>
    <th>lastname</th>
    <th>amount</th>
    <th>dateOfPayment</th>
</tr>

    @foreach($data as $content)
    <tr >
    <td>{{$content->memberID}}</td>
    <td>{{$content->firstName}}</td>
    <td>{{$content->middleName}}</td>
    <td>{{$content->amount}}</td>
    <td>{{$content->dateOfPayment}}</td>
    </tr> 
 @endforeach

</table>


@endsection