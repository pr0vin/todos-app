@extends('layouts.app')
@section('body')


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Profile Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" style="width: 50px; height: 50px; border-radius: 50%;">
                @else
                <img src="{{ asset('images/default.png') }}" alt="Default Image" style="width: 50px; height: 50px; border-radius: 50%;">
                @endif
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>


            <td class="d-flex justify-content-center align-items-center">e
                <a href="{{route('users.edit',$user->id)}}">edit</a>

                <form action="{{route('users.delete',$user->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection