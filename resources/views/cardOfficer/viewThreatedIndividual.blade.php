@extends('cardOfficer.cardOfficerHomepage')
@section('content')
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
<h1>{{__('field.individualDetail')}}</h1>
<table>
    <tr>
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.clinicID')}}</th>
    <th>{{__('field.dateOfTreatment')}}</th>
    </tr>
    @foreach($allData as $data)
    <tr>
        <td>{{$data->memberID}}</td>
        <td>{{$data->firstName}}</td>
        <td>{{$data->lastName}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->created_at}}</td>
    </tr>
    @endforeach
</table>
<a href="{{ url('/generatReport') }}">{{__('field.generateReport')}}</a>

@endsection