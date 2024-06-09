@extends('financeOfficer.financeOfficerHomepage')
@section('content')
<head>
    <link rel="stylesheet" href="css/sideBar.css">
</head>

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
<h4>{{__('field.cashinHeader')}}</h4><hr>
<table>
    <tr>
        <th>{{__('field.acountID')}}</th>
        <th>{{__('field.amount')}}</th>
        <th>{{__('field.dateOfPayment')}}</th>
        <th>{{__('field.waysOfPayment')}}</th>
        <th>{{__('field.memberID')}}</th>
        
    
    </tr>
    @foreach($cashin as $data)
    <tr>
        <td>{{$data->accountID}}</td>
        <td>{{$data->amount}}</td>
        <td>{{$data->dateOfPayment}}</td>
        <td>{{$data->waysOfPayment}}</td>
        <td>{{$data->employeeID}}</td>
                
 
       

    </tr>
    @endforeach
</table>


@endsection