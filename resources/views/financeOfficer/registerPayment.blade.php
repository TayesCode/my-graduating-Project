@extends('financeOfficer/financeOfficerHomepage')
@section('content')
<head>
    <link rel="stylesheet" href="css/inputForm.css">

</head>
<body>
    <div style="padding: 20px">
    <div class="container">
        <h4> {{__('field.registerPayment')}}</h4><hr>
        <div style="padding: 30px">
      <form action="{{url('/createPayment')}}" method='post'>
      @if(Session::has('success'))
        <div class='alert alert-success'>{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class='alert alert-danger'>{{Session::get('fail')}}</div>
        @endif 
      @csrf
          <label for="id">{{__('field.paymentID')}}</label><br>
          <input type="text" id="date" name='paymentID'><br>
          <span style='color:red;' >@error('paymentID'){{$message}}@enderror</span><br>

          <label for="date">{{__('field.dateOfPayment')}}</label><br>
          <input type="Date" id="date" name="dateOfPayment" ><br>
          <span style='color:red'>@error('dateOfPayment'){{$message}}@enderror</span><br>

          <label for="fname">{{__('field.typesOfPayment')}}</label><br>
        <select id="type" name="type"><br>
            <option value="cashin">{{__('field.cashin')}}</option>
            <option value="cashout">{{__('field.cashout')}}</option>
          </select><br>
          <span style='color:red'>@error('type'){{$message}}@enderror</span><br>

          <label for="amount">{{__('field.amount')}}</label><br>
          <input type="text" id="cashier" name="amount"><br>
          <span style='color:red'>@error('amount'){{$message}}@enderror</span><br>

          <label for="cashier">{{__('field.cashier')}}</label><br>
          <input type="text" id="cashier" name="cashier" ><br>
          <span style='color:red'>@error('cashier'){{$message}}@enderror</span><br>

          <label for="sourceOfPayment">{{__('field.sourceOfPayment')}}</label><br>
         <input type="text" name="sourceOfPayment"><br>
          <span style='color:red'>@error('sourceOfPayment'){{$message}}@enderror</span><br>

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