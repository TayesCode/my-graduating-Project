@extends('board.boardHomepage')
@section('content')
<h4>{{__('field.individualDetail')}} </h4>
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
<table>

<tr > 
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
    <th>{{__('field.role')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.schemeID')}}</th>
    <th>{{__('field.email')}}</th>
    <th>{{__('field.userName')}}</th>
    <th>{{__('field.photo')}}</th>
</tr>
 <tr >
    <td>{{$staff->employeeID}}</td>
    <td>{{$staff->firstName}}</td>
    <td>{{$staff->middleName}}</td>
    <td>{{$staff->lastName}}</td>
     <td>{{$staff->role}}</td>
    <td>{{$staff->phone}}</td>
    <td>{{$staff->schemeID}}</td>
    <td>{{$staff->email}}</td>
    <td>{{$staff->userName}}</td>
    
    <td>
        <img style='height:50px;' src="../storage/images/{{$staff->photo}}" alt="image doesn't exist">
    </td>
   
</tr>
@endsection