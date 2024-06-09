@extends('healthEx/healthExtensionHome')
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
    <th>{{__('field.amount')}}</th>
    <th>{{__('field.dateOfPayment')}}</th>
    <th colspan='1' ><center>{{__('field.actions')}}</center></th> 
</tr>

     @foreach($payment as $memberPayment)
    <tr >
    <td>{{$memberPayment->memberID}}</td>
    <td>{{$memberPayment->firstName}}</td>
    <td>{{$memberPayment->middleName}}</td>
    <td>{{$memberPayment->amount}}</td>
    <td>{{$memberPayment->dateOfPayment}}</td>
  
    <td>

    <a href={{"/extensiongiveReceite/".$memberPayment->id}} class='btn btn-success'>Give Recite</a>

</td>
    </tr> 
    @endforeach

</table>

<!-- customize the pagination -->
<div class="col-md-12" >
</div>
<!-- <span>
 

    
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