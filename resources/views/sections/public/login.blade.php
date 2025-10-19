@extends('layouts.public')
@section('content')
<form action="{{ route('auth.login') }}" method="post" class="form-signin bg-light mt-5 p-5">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Employee ID</label>
    <select name="user_id" class="form-control">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->id }}</option>
        @endforeach
    </select>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required value="test">
    <div class="checkbox mb-3">
    <label>
        <input type="checkbox" value="remember-me"> Remember me
    </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

@stop
