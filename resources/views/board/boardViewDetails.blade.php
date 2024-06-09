@extends('board/boardHomepage')
@section('content')
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<h4>{{__('field.viewMembersHeader')}}</h4><hr>
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
    <th>{{__('field.id')}}</th>
    <th>{{__('field.memberID')}}</th>
    <th> {{__('field.fName')}}</th>
    <th> {{__('field.mName')}}</th>
    <th> {{__('field.photo')}}</th>
  

</tr>
  @foreach($family as $data)
  
    <tr >
    <td>{{$data->id}}</td>
    <td>{{$data->memberID}}</td>
    <td>{{$data->firstName}}</td>
    <td>{{$data->lastName}}</td>
    
    <td>
        <img style='height:50px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
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