@extends('layout')
@section('content')
<div class="col-md-4 offset-md-3">
    <h2>Login form</h2>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    <form action="{{route('authenticate')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" name="email">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" value="{{ old('password') }}" name="password">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button><br>
        <a href="{{route('register')}}">click here to register..</a>
    </form>
</div>
@endsection
