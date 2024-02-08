@extends('layouts.backend-layout')

@section('title')
    Add New User
@endsection

@section('breadcrumb')
    Add New User
@endsection

@section('content')

    @if(session()->has('danger'))

        <div class="alert alert-danger" role="alert">
            <strong>Success - </strong> {{session('danger')}}

        </div>
    @endif
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

    @if($countUserData == 5)

        <h1>Limit Reached</h1>

    @else

        <form method="post" action="{{ route('createUser')}}" autocomplete="off">
            @csrf


            <input type="hidden" name="belong_to_gym">
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input class="form-control" type="text" required=""
                       placeholder="Enter your User Name" name="name">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input class="form-control" type="number" required=""
                       placeholder="User Phone" name="phone">
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input class="form-control" type="password"
                       placeholder="User password" name="password">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select class="form-select mb-3" name="type" required>
                    @if($countUserData == 1)
                        <option value="superAdmin">Super Admin</option>
                    @elseif($countUserData == 2)
                        <option value="admin">Admin</option>
                    @elseif($countUserData == 3 || $countUserData == 4)
                        <option value="trainer">Trainer</option>
                    @else
                        <option value="">{{"limit full"}}</option>
                    @endif
                </select>
            </div>


            <hr>
            <div class="mb-3 mb-0 text-center">
                <button class="btn btn-primary" type="submit">Create User</button>
            </div>

        </form>

    @endif

@endsection
