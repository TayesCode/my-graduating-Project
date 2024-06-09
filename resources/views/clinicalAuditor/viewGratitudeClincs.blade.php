@extends('clinicalAuditor.clinicalAuditorHomepage')
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
    <th>{{__('field.gClinicID')}}</th>
    <th>{{__('field.name')}}</th>
    <th>{{__('field.officeTelephone')}}</th>
    <th>{{__('field.acountID')}}</th>
    <th>{{__('field.services')}}</th>
    <th>{{__('field.woreda')}}</th>
</tr>

     @foreach($result as $data)
    <tr >
    <td>{{$data->g_clinicID}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->officeTelephone}}</td>
    <td>{{$data->accountID}}</td>
    <td>{{$data->servicies}}</td>
    <td>{{$data->woreda}}</td>

    </tr> 
    @endforeach

</table>
<!-- customize the pagination -->



@endsection