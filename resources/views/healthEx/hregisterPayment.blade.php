@extends('healthEx.healthExtensionHome')
@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">
<!-- {{--<style>
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=float]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=Date]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 10px;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  padding-top: 6px;
  width:100%;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>--}} -->
</head>
<body>
    <div style="padding: 20px">
    <div class="container">
        <h4> {{__('field.registerPayment')}}</h4><hr>
        <div style="padding: 30px">
      <form action="{{url('/memberCreatePayment')}}" method='post'>
      @if(Session::has('success'))
        <div class='alert alert-success'>{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class='alert alert-danger'>{{Session::get('fail')}}</div>
        @endif 
      @csrf
          <!-- <label for="id">{{__('field.paymentID')}}</label><br>
          <input type="text" id="date" name='paymentID'><br>
          <span style='color:red;' >@error('paymentID'){{$message}}@enderror</span><br> -->

          <label for="date">{{__('field.dateOfPayment')}}</label><br>
          <input type="Date" id="date" name="dateOfPayment" ><br>
          <span style='color:red'>@error('dateOfPayment'){{$message}}@enderror</span><br>

          <label for="fname">{{__('field.typesOfPayment')}}</label><br>
        <select id="type" name="type"><br>
            <option value="cashin">{{__('field.cashin')}}</option>
          </select><br>
          <span style='color:red'>@error('type'){{$message}}@enderror</span><br>

          <label for="amount">{{__('field.amount')}}</label><br>
          <input type="text" id="cashier" name="amount"><br>
          <span style='color:red'>@error('amount'){{$message}}@enderror</span><br>

          <label for="cashier">{{__('field.memberID')}}</label><br>
          <input type="text" id="cashier" name="memberID" ><br>
          <span style='color:red'>@error('cashier'){{$message}}@enderror</span><br>

          <label for="waysofpayment">{{__('field.waysOfPayment')}}</label><br>
        <select id="type" name="waysOfPayment"><br>
            <option value="for update">{{__('field.forUpdate')}}</option>
            <option value="fro register">{{__('field.forRegister')}}</option>
            <option value="for renewal">{{__('field.forRenewal')}}</option>
          </select><br>
          <span style='color:red'>@error('waysOfPayment'){{$message}}@enderror</span><br>

          <label for="account">{{__('field.acountID')}}</label><br>
          <input type="text" id="AccountID" name="accountID" ><br>
          <span style='color:red'>@error('accountID'){{$message}}@enderror</span><br>

        </div>
      </div>
      <br>
      <div class="buttonContainer">
        <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}">
        <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
      </div>
      </form>
    </div>
    </div>
</div>
</body>
@endsection