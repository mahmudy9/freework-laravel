@extends('app')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div ckass="col-8">
@include('errors')
@include('flash')
<form method="post" action="{{url('customer/updatejob')}}" enctype="multipart/form-data" >
@csrf
  <div class="form-row">
      <div class="form-group col-md-12">
      <label for="inputEmail4">Job Title</label>
      <input type="text" name="title" value="{{$job->title}}" class="form-control" id="inputEmail4" placeholder="" required>
    </div>
    <input type="hidden" name="id" value="{{$job->id}}" >
  </div>
  <div class="form-group">
    <label for="inputAddress">Job Description</label>
    <textarea name="description"  class="form-control" id="inputAddress" required>{{$job->description}}</textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Job Phone</label>
      <input type="text" name="phone" value="{{$job->phone}}" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-12">
      <label for="inputZip">Job Image</label>
      <input type="file" name="image"  class="form-control" />
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Update Job</button>
</form>

</div>
</div>
</div>


@endsection