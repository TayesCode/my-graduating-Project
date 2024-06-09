@extends('healthEx/healthExtensionHome')
@section('content')
<h4>{{__('field.viewRequestHeader')}}</h4><hr>
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

<tr>

    <th> {{__('field.memberID')}} </th>
    <th>{{__('field.subject')}} </th>
    <th>{{__('field.Description')}} </th> 
    <th>{{__('field.Dateofsend')}} </th> 
    <th>{{__('field.actions')}} </th> 

    
</tr>

    @foreach($data as $req)

    <tr>
    <td>{{$req->memberID}}</td>
    <td>{{$req->subject}}</td>
    <td>{{$req->description}}</td>
    <td>{{$req->created_at}}</td>
   
    <td> 
    <form method="POST" action="{{ route('request.delete', $req->id) }}">
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