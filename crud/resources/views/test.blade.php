@extends('layout')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-6">
@foreach($user as $key=> $val)
<h1>{{$val->first_name}} - <?php if(!empty($val->address)) { ?> {{$val->address->address}} <?php }else { echo "Address not found";} ?></h1>
<p>{{$val->role->role}}</p>
@endforeach
</div>

<div class="col-md-6">
@foreach($role as $key=> $val)
 <h1>{{$val->role}}</h1>
 @foreach($val->user as $user_name)
 <p>{{$user_name->first_name}}</p>

 @endforeach
@endforeach
</div>
</div>
</div>

@endsection