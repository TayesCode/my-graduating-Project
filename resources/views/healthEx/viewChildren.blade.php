@extends('healthEx/healthExtensionHome')
@section('content')
<style>
    a{
        color: #000;
    }
</style>
<h4>{{__(field.familyName)}}</h4><hr>
<table>

<tr>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.photo')}}</th> 
    <th>{{__('field.actions')}}</th> 
    
</tr>

    @foreach($children as $child)

    <tr>
    <td>{{$child->firstName}}</td>
    <td>{{$child->phone}}</td>
    <td>
        <img style='width:100px; height:70px;' src="../storage/images/{{$child->photo}}" alt="image doesn't exist">
    </td>
    <td>
    <a href={{"/deleteChild/".$child->memberID}}>{{__('field.deleteI')}}</a>
    <a href="">{{__('field.update')}}</a>
    <a href={{"/detailOfChild/".$child->memberID}}>{{__('field.view')}}</a>

    </td>
    </tr>
    @endforeach

</table>
<!-- customise the pagination -->
<div class="col-md-12" >
 {{ $children->links('vender.pagination.custom')}}
</div>
<!-- 
<span>
    {{$children->links()}}

    }
</span>
<style>
    .w-5{
        display:none;
    }
</style> -->
@endsection