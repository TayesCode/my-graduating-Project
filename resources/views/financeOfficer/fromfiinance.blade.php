@extends('financeOfficer.financeOfficerHomepage')
@section('content')
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/sideBar.css">
</head>
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
<h4>{{__('field.cashinHeader')}}</h4><hr>

<table>
@if(Session::has('success'))
        <div class='alert alert-success'>{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class='alert alert-danger'>{{Session::get('fail')}}</div>
        @endif 
    <tr>
        <th>{{__('field.paymentID')}}</th>
        <th>{{__('field.acountID')}}</th>
        <th>{{__('field.typesOfPayment')}}</th>
        <th>{{__('field.amount')}}</th>
        <th>{{__('field.dateOfPayment')}}</th>
        <th>{{__('field.waysOfPayment')}}</th>
        <th>{{__('field.employeeID')}}</th>
        <th colspan="3">{{__('field.actions')}}</th>
    </tr>
    @foreach($cashin as $data)
    <tr>   
        <td>{{$data->paymentID}}</td>
        <td>{{$data->accountID}}</td>
        <td>{{$data->typesOfPayment}}</td>
        <td>{{$data->amount}}</td>
        <td>{{$data->dateOfPayment}}</td>
        <td>{{$data->waysOfPayment}}</td>
        <td>{{$data->staffID}}</td>
        <td><a href={{"/editPayment/".$data->paymentID }}>{{__('field.edit')}}</a></td>
       <td><form method="POST" action="{{ route('data.financedelete', $data->paymentID) }}">
        @csrf
     <input name="_method" type="hidden" value="DELETE">
     <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>{{__('field.deleteI')}}</button>
    </form></td>
       

    </tr>
    @endforeach
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
</table>
<a href="{{url('/generate')}}">{{__('field.generateReport')}}</a>



@endsection