@extends('healthEx/healthExtensionHome')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />


   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<h4>Welcome to the view Members page</h4><hr>

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
    <th>ID</th>
    <th>{{__('field.memberID')}}</th>
    <th> {{__('field.fName')}}</th>
    <th> {{__('field.mName')}}</th>
    <th> {{__('field.photo')}}</th>
    <th colspan='2'> {{__('field.actions')}}</th>

</tr>
  @foreach($family as $data)
  
    <tr >
    <td>{{$data->id}}</td>
    <td>{{$data->memberID}}</td>
    <td>{{$data->firstName}}</td>
    <td>{{$data->lastName}}</td>
    
    <td>
        <img style='width:100px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
    </td>
    <td>
        <a href={{"editFamilyMemberInfo/".$data->id}} class='btn btn-success'>{{__('field.edit')}}</a>

    </td>
    <td>        
        <!-- <a href={{"deleteChild/".$data->id}} class='button delete-confirm'>delete</a> -->
     <form method="POST" action="{{ route('children.delete', $data->id) }}">
        @csrf
     <input name="_method" type="hidden" value="DELETE">
     <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
    </form>
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