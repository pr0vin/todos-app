@extends('layouts.app')
@section('body')

<div class="container">
    <h1>Register</h1>
<form action="{{$user->id ? route('users.update',$user->id) : route('register.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($user->id)
        @method('PUT')
    @endif
    <div>
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}"  >
        @error('name')
        <spa>
            <strong class="text-danger">{{$message}}</strong>
        </span>
            
        @enderror
    </div>


    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" class="form-control"  name="email"   value="{{old('email',$user->email)}}"  >

        @error('email')
        <spa>
            <strong class="text-danger">{{$message}}</strong>
        </span>
            
        @enderror
    </div>

    <div>
        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" class="form-control"  name="profile_image"   value="{{old('profile_image',$user->profile_image)}}"  >

        @error('profile_image')
        <spa>
            <strong class="text-danger">{{$message}}</strong>
        </span>
            
        @enderror
    </div>
   
 @if (!$user->id)
 <div>
    <label for="password">Password:</label>
    <input type="password" id="password" class="form-control"  name="password" value="{{old('password',$user->password)}}"  >
    @error('password')
    <spa>
        <strong class="text-danger">{{$message}}</strong>
    </span>
        
    @enderror
</div>
 <div>
    <label for="password">Confirm Password:</label>
    <input type="password" id="password_con" class="form-control"  name="password_confirmation" >
    @error('password_confirmation')
    <spa>
        <strong class="text-danger">{{$message}}</strong>
    </span>
        
    @enderror
</div>
 @endif
    <button type="submit" class="btn btn-primary mt-3">{{$user->id ? "Update User" : "Register" }} </button>
</form>
</div>
@endsection