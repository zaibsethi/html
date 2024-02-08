@extends('layouts.backend-layout')

@section('title')
    Create Gym
@endsection

@section('breadcrumb')
    Create Gym
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

    <form method="post" action="{{ route('createGym')}}" autocomplete="off"
          enctype="multipart/form-data">
        @csrf

        <label class="form-label">Gym Id:</label>

        <input class="form-control" type="text" readonly value="{{$id+1}}" name="gym_id" required>
        <br>
        <div class="mb-3">
            <label class="form-label">Gym Name</label>
            <input class="form-control" type="text"
                   placeholder="Enter Gym Name" name="gym_name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gym Logo</label>
            <input class="form-control" type="file"
                   placeholder="Gym Logo" name="gym_logo" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Gym package</label>
            <select class="form-select mb-3" name="gym_package" required>
                <option selected value="">Select package</option>
                <option value="free">Free</option>
                <option value="paid">Paid</option>

            </select>

        </div>
        <div class="mb-3">
            <label class="form-label">Message Api</label>
            <input class="form-control" type="text"
                   placeholder="Enter Gym api" name="message_api_key">
        </div>
        <div class="mb-3">
            <label class="form-label">Package start</label>
            <input class="form-control" type="date"
                   placeholder="Gym package start date" name="gym_package_start_date" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Package end</label>
            <input class="form-control" type="date"
                   placeholder="Gym package end date" name="gym_package_end_date" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gym City</label>
            <select class="form-select mb-3" name="gym_city" required>
                <option selected value="">Select city</option>
                <option value="lahore">Lahore</option>

            </select>

            <input type="text" name="gym_title" hidden>
            <input type="text" name="gym_slug" hidden>
        </div>
        <div class="mb-3">
            <label class="form-label">Gym Area</label>
            <select class="form-select mb-3" name="gym_area" required>
                <option selected value="">Select Area</option>
                <option value="garhiShahu">Garhi Shahu</option>
            </select>
        </div>
        <hr>
        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 fw-bold">User Data</h4>
        </div>
        <hr>
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input class="form-control" type="text"
                   placeholder="Enter your User Name" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input class="form-control" type="number"
                   placeholder="User phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input class="form-control" type="password"
                   placeholder="User password" name="password" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Type</label>
            <input class="form-control" type="text"
                   placeholder="User Type" name="type" value="owner" readonly>
        </div>

        <input name="belong_to_gym" hidden>

        <hr>
        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Add Gym</button>
        </div>

    </form>

@endsection
