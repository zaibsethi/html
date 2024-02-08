@extends('layouts.backend-layout')

@section('title')
    Edit User
@endsection

@section('breadcrumb')
    Edit User
@endsection

@section('content')

    @if(session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>Success - </strong> {{session('success')}}

        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('updateUser',['id'=>$userData->id])}}"
          enctype="multipart/form-data" autocomplete="off">
        @csrf


        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input class="form-control" type="text" required=""
                   placeholder="Enter your User Name" name="name" value="{{$userData->name}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" required=""
                   placeholder="User email" name="email" value="{{$userData->email}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input class="form-control" type="number" required=""
                   placeholder="User Phone" name="phone" value="{{$userData->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input class="form-control" type="password"
                   placeholder="User password" name="password" value="{{$userData->password}}">
        </div>
        <div class="mb-3">
            <label class="form-label">User picture</label>
            <input class="form-control" type="file"
                   placeholder="Gym Logo" name="image" >
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input class="form-control" value="{{$userData->type}}" readonly>
        </div>

        <hr>
        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Update</button>
        </div>

    </form>

@endsection
