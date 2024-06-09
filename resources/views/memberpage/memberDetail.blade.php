@extends('memberpage/index')
@section('content')
<head>
    <link rel="stylesheet" href="css/layout.css">
</head>
<h4>Welcome to the view profile page <hr></h4>

<style>
<style>
    a{
        margin-left:20px;
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
        padding:8px;

    }
    tr:nth-child(even){
        background-color:#ddd;
    }
</style>


<table>

<tr> 
   
    <th>{{__('field.memberID')}}</th>
    <th> {{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th> {{__('field.lName')}}</th>
    <th>{{__('field.userName')}}</th>
    <th>{{__('field.email')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.status')}}</th>
    <th> {{__('field.photo')}}</th>

</tr>

  
    <tr >
 
    <td>{{$data->memberID}}</td>
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    <td>{{$data->lastName}}</td>
    <td>{{$data->userName}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->status}}</td>



    
    
    <td>
        <img style='width:100px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
    </td>
 
    </tr> 
 

</table>

@endsection