@extends('app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-4">
<h2>{{$job->title}}</h2>
<img src="{{asset('storage/storage/img/'.$job->image)}}" width="200px" height="350px" >
</div>
<div class="col-4">
<h3>Description</h3>
<p>{{$job->description}}</p>
</div>
<div class="col-4">
<h3>Details</h3>
@if($job->approved == 1)
<p>Approved</p>
@else
<p>Not Approved</p>
@endif

<p>Customer: <a href="{{url('user/'.$job->user->id)}}" >{{$job->user->name}}</a></p>
<p>{{$job->phone}}</p>
<p><small>{{$job->created_at}}</small></p>
<a href="{{url('customer/editjob/'.$job->id)}}" class="btn btn-danger" >Edit Job</a>
</div>
<div class="col-8">
<br><br>

@if($res == 1)
  @foreach($requests as $request)
<div class="card" id="{{$request->id}}">
  <div class="card-header">
    Request For Your Job
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$request->user->name}}</h5>
    <p class="card-text">{{$request->user->phone}}</p>
        <p class="card-text">{{$request->user->address}}</p>
    <div class="row justify-content-center" >
    <div class="col-6">
    <a href="{{url('customer/acceptrequest/'.$request->id)}}" class="btn btn-primary">Accept request</a>
    </div>
    <div class="col-6">
      <button onclick="refuse_request('{{url('customer/refuserequest')}}','{{$request->id}}')" class="btn btn-danger">Refuse request</button>
    </div>
    </div>
  </div>
</div>
<br>
@endforeach
@else
<div class="card">
  <div class="card-header">
    You accepted for the Job
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$req->user->name}}</h5>
    <p class="card-text">{{$req->user->phone}}</p>
        <p class="card-text">{{$req->user->address}}</p>

    <a href="{{url('customer/undorequest/'.$req->id)}}" class="btn btn-primary">Undo request</a>
  </div>
</div>
@endif
{{$requests->links('paginator')}}
</div>
</div>


</div>
@endsection