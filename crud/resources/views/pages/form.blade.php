@extends('layout')

@section('content')
<div class="col-md-4 offset-md-3">
<h2>Create form</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  @endsection