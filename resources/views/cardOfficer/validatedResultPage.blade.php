@extends('cardOfficer.cardOfficerHomepage')
@section('content')
<h1>{{__('field.treatedIndividualHeader')}}</h1>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<table id='customers'>
    <tr>
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
    <th>{{__('field.status')}}</th>
    <th>{{__('field.photo')}}</th>
    <th>{{__('field.familyMember')}}</th>
   
    </tr>
    @foreach($result as $data)
    <tr>
        <td>{{$data->memberID}}</td>
        <td>{{$data->firstName}}</td>
        <td>{{$data->middleName}}</td>
        <td>{{$data->lastName}}</td>
        <td>{{$data->status}}</td>
        <td>
        <img style='width:100px; height:70px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
    </td>
    <td><a href={{'/listOfFamily/'.$data->memberID }}>{{__('field.familyMember')}}</a></td>
        
    </tr>
    @endforeach
</table>

@endsection