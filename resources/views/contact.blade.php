@extends('app')

@section('content')
<div class="container" >

<div class="row justify-content-center" >
<div class="col-8">
This is Contact Page
<hr>
@include('errors')
@include('flash')
<form method="post" action="{{url('contact')}}" >
@csrf
@guest
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="name" value=" {{old('name')}} " class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" value=" {{old('email')}} " class="form-control">
  </div>
@endguest
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="body" rows="3">{{old('body')}}</textarea>
  </div>
    <div class="form-group">
    <label></label>
    <button class="btn btn-primary" type="submit">Send</button>
  </div>

</form>
</div>
</div>



</div>


@endsection