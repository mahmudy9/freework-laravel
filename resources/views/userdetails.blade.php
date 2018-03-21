@extends('app')

@section('content')
<div class="container" >

<div class="row justify-content-center" >
<div class="col-8">
<h2>User Details Page</h2>
<p>User: {{$user->name}}</p>
<p>User Email: {{$user->email}}</p>
</div>
</div>



</div>


@endsection