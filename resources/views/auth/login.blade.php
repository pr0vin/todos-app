@extends('layouts.app')
@section('body')

<div class="container">
    <h1>Login</h1>

    <form action="{{route('login')}}" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" class="form-control" name="email">

            @error('email')
            <span>
                <strong class="text-danger">{{$message}}</strong>
            </span>

            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" name="password">
            @error('password')
            <span>
                <strong class="text-danger">{{$message}}</strong>
            </span>

            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3"> Login </button>
    </form>
</div>
@endsection