@extends('board.boardHomepage')
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
    <th>{{__('field.clinicID')}}</th>
    <th>{{__('field.nameOfClinic')}}</th>
    <th>{{__('field.auditResult')}}</th>
    <th>{{__('field.fileupload')}}</th>
    <th>{{__('field.action')}}</th>
</tr>

     @foreach($result as $data)
    <tr >
    <td>{{$data->clinicID}}</td>
    <td>{{$data->nameOfClinic}}</td>
    <td>{{$data->auditResult}}</td>
    <td>{{$data->fileUpload}}</td>
    <td><a href={{"/downloadreport/".$data->fileUpload}}>download report</a></td>
    </tr> 
    @endforeach

</table>
<!-- customize the pagination -->



@endsection