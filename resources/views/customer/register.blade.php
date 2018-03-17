@extends('app')

@section('content')
<div class="container">

<div class="row">
<div class="col-8">
<h2>Customer Register</h2>
<form method="post" action="{{url('customer/register')}}" >
@csrf
  <div class="form-row">

    <div class="form-group col-md-12">
      <label for="inputEmail4">Customer Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Customer Email">
    </div>
</div>

  <div class="form-row">
      <div class="form-group col-md-12">
      <label for="inputEmail4">Customer Name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Customer Name" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Password">
    </div>


  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="city" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Phone</label>
      <input type="text" name="phone" class="form-control" id="inputZip" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
</div>


</div>


@endsection