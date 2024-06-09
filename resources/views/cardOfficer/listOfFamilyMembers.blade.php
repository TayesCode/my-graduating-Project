@extends('cardOfficer.cardOfficerHomepage')
@section('content')

<table>

<tr> 
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
      <th>{{__('field.photo')}}</th>

</tr>
  @foreach($result as $data)
  
    <tr >
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    <td>{{$data->lastName}}</td>
    <td>
    <img style='height:50px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">

    </td>
    </tr> 

    @endforeach

</table>
<span>
    {{$result->links()}}

    
</span>
<style>
    .w-5{
        display:none;
    }
</style>
@endsection