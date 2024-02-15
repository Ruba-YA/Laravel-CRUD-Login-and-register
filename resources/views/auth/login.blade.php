@extends('Components.layout')
@section('content')
<form action="/login" method="post">
    @csrf
   
    <div class="form-group">
        <label for="user-email">User Email:</label>
        <input name="email" class="form-control" id="user-email" type="email" placeholder="User Email..." />
    </div>
    <div class="form-group">
        <label for="user-password">User Password:</label>
        <input name="password" class="form-control" id="user-password" type="password" placeholder="User Password..." />
    </div>
   
    </div>
    <button class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
</form>
@endsection