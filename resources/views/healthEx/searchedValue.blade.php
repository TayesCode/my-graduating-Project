@extends('healthEx/healthExtensionHome')
@section('content')

<h4>{{__('field.individualDetail')}}</h4><hr>
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
    <th colspan='4' ><center>{{__('field.actions')}}</center></th> 
</tr>

 @foreach($member as $data)
    <tr >
    <td>{{$data->memberID}}</td>
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    <td>{{$data->lastName}}</td>
    <td>{{$data->status}}</td>
    <td>{{$data->phone}}</td>
  
    <td>
        <img style='width:100px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
    </td>
    <td>
    <form method="POST" action="{{ route('member.delete',  $data->memberID) }}">
        @csrf
     <input name="_method" type="hidden" value="DELETE">
     <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
    </form>

    </td>
    
    <td>
    <a href={{"/editMember/".$data->memberID}} class='btn btn-success'>{{__('field.edit')}}</a>
    <a href={{"/renew/".$data->memberID}} class='btn btn-success'>{{__('field.renewed')}}</a>


    <a href={{"/viewProfile/".$data->memberID}} class='btn btn-primary'>{{__('field.familyMember')}}</a>
   <a href={{"/giveMembershipID/".$data->memberID}} class='btn btn-success'>{{__('field.giveMembershipID')}}</a>
   
</td>
    </tr> 
   @endforeach

</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

@endsection