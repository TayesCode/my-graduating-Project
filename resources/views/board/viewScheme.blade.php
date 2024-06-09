@extends('board.boardHomepage')
@section('content')
<h1>Welcome to view scheme page</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
    <th>{{__('field.schemeID')}}</th>
    <th>{{__('field.name')}}</th>
    <th>{{__('field.fax')}}</th>
    <th>{{__('field.officeTelephone')}}</th>
    <th>{{__('field.region')}}</th>
    <th>{{__('field.email')}}</th>
    <th>{{__('field.accountID')}}</th>
    <th colspan='3' ><center>{{__('field.actions')}}</center></th> 
</tr>

     @foreach($scheme as $data)
    <tr >
    <td>{{$data->schemeID}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->fax}}</td>
    <td>{{$data->offiiceTelephone}}</td>
    <td>{{$data->region}}</td>
    <td>{{$data->email}}</td>
    <td> {{$data->accountID}}</td>
    <td>
    <form method="POST" action="{{ route('scheme.delete', $data->schemeID) }}">
        @csrf
     <input name="_method" type="hidden" value="DELETE">
     <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
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