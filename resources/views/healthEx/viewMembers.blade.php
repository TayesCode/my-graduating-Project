@extends('healthEx/healthExtensionHome')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
    <th>{{__('field.status')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.photo')}}</th> 
    <th colspan='4' ><center>{{__('field.actions')}}</center></th> 
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
        <img style='width:70px;' src="../storage/images/{{$member->photo}}" alt="image doesn't exist">
    </td>
    <td>
    <form method="POST" action="{{ route('member.delete', $member->memberID) }}">
        @csrf
     <input name="_method" type="hidden" value="DELETE">
     <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
    </form>

    </td>
    
    <td>
    <a href={{"/editMember/".$member->memberID}} class='btn btn-success'>{{__('field.edit')}}</a>
    <a href={{"/renew/".$member->memberID}} class='btn btn-success'>{{__('field.renewed')}}</a>


    <a href={{"/viewProfile/".$member->memberID}} class='btn btn-primary'>{{__('field.familyMember')}}</a>
   <a href={{"/giveMembershipID/".$member->memberID}} class='btn btn-success'>{{__('field.giveMembershipID')}}</a>
   
</td>
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