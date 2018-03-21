@extends('app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-4">
<img src="{{asset('storage/storage/img/'.$job->image)}}" width="300px" height="400px" >
</div>
<div class="col-4">
<p>{{$job->description}}</p>
</div>
<div class="col-4">
<p>Customer: <a href="{{url('user/'.$job->user->id)}}" >{{$job->user->name}}</a></p>
<p>{{$job->phone}}</p>
<p><small>{{$job->created_at}}</small></p>
<p> 
@auth
@if(Auth::user()->hasRole('worker'))
    @if($button == 1)
        <span id="{{$job->id}}">
        <button class="btn btn-primary" onclick="applyforjob('{{url('worker/requestjob')}}' , '{{$job->id}}')" >Apply For Job</button></span>
    @elseif($button == 0)
        <button class="btn btn-primary" disabled>You Already applied For this Job</button>

    @elseif($yourjob == 1)
        <button class="btn btn-primary" disabled>You're accepted For this Job</button>
    @elseif($jobclosed == 1)
            <button class="btn btn-primary" disabled>Job Closed</button>
    @endif
@elseif(Auth::user()->hasRole('company'))
    @if($button == 1)
        <span id="{{$job->id}}">
        <button class="btn btn-primary" onclick="applyforjob('{{url('company/requestjob')}}' , '{{$job->id}}')" >Apply For Job</button></span>
    @elseif($button == 0)
        <button class="btn btn-primary" disabled>You Already applied For this Job</button>

    @elseif($yourjob == 1)
        <button class="btn btn-primary" disabled>You're accepted For this Job</button>
    @elseif($jobclosed == 1)
            <button class="btn btn-primary" disabled>Job Closed</button>
    @endif
@endif
@else
    <button class="btn btn-info" disabled>You need to register to apply for job</button>
@endauth
</p>

</div>
</div>


</div>
@endsection