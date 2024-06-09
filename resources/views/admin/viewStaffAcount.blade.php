@extends('admin.adminHomepage')
@section('content')
<h4>{{__('field.listOfStaff')}}</h4>
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
    <th>{{__('field.employeeID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
    <th>{{__('field.role')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.photo')}}</th>
    <th colspan='3' ><center>{{__('field.actions')}}</center></th> 
</tr>

     @foreach($staffs as $staff)
    <tr >
    <td>{{$staff->employeeID}}</td>
    <td>{{$staff->firstName}}</td>
    <td>{{$staff->middleName}}</td>
    <td>{{$staff->lastName}}</td>
     <td>{{$staff->role}}</td>
    <td>{{$staff->phone}}</td>
    <td>
        <img style='width:50px;' src="../storage/images/{{$staff->photo}}" alt="image doesn't exist">
    </td>
    <td>
    <form method="POST" action="{{ route('staff.delete', $staff->employeeID) }}">
        @csrf
     <input name="_method" type="hidden" value="Delete">
     <button type="submit" class="btn  btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
    </form>

    </td>
    <td>
    
        <!-- <a href="" class='btn btn-danger '>delete</a> -->
        <a href={{"/edit/".$staff->employeeID}} class='btn btn-success'>{{__('field.edit')}}</a>
        <a href={{"/viewProfileStaff/".$staff->employeeID}} class='btn btn-primary'>{{__('field.view')}}</a>
    </td>

 
    
 
    </tr> 
    @endforeach

</table>
<!-- customize the pagination -->
<div class="col-md-12" >
 {{ $staffs->links('vender.pagination.custom')}}
</div>

<!-- <span>
    {{$staffs->links()}}
</span>

<style>
    .w-5{
        display:none;
       
    }
</style> -->

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