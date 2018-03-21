@extends('app')

@section('content')
<div class="container">

<div class="row">
<div class="col-8">
<h2>FreeWorker Register</h2>
<form method="post" action=" {{url('worker/register')}} " >
@csrf
  <div class="form-row">

    <div class="form-group col-md-12">
      <label for="inputEmail4">Worker Email</label>
      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail4" placeholder="Worker Email" required>
    </div>
</div>

  <div class="form-row">
      <div class="form-group col-md-12">
      <label for="inputEmail4">Worker Name</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="inputEmail4" placeholder="Worker Name" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>

  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" value="{{old('address')}}" placeholder="1234 Main St" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="city" value="{{old('city')}}" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Phone</label>
      <input type="text" name="phone" class="form-control" value="{{old('phone')}}" id="inputZip" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
</div>


</div>


@endsection