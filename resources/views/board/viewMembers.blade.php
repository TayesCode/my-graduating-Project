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
<table>

<tr > 
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
    <th>{{__('field.status')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.photo')}}</th> 
    <th>{{__('field.familyMember')}}</th>
    
</tr>

     @foreach($members as $member)
    <tr >
    <td>{{$member->memberID}}</td>
    <td>{{$member->firstName}}</td>
    <td>{{$member->middleName}}</td>
    <td>{{$member->lastName}}</td>
    <td>{{$member->status}}</td>
    <td>{{$member->phone}}</td>
    <td>
        <img style='width:50px;' src="../storage/images/{{$member->photo}}" alt="image doesn't exist">
    </td>
    <td><a href={{"/boardViewProfile/".$member->memberID}} class='btn btn-primary'>{{__('field.view')}}</a></td>
</tr>
@endforeach
</table>

<!-- customize the pagination -->
<div class="col-md-12" >
 {{ $members->links('vender.pagination.custom')}}
</div>
<!-- <span>
    {{$members->links()}}

    
</span>
<style>
    .w-5{
        display:none;
    }
</style> -->


@endsection