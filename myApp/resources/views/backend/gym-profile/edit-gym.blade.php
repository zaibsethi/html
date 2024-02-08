@extends('layouts.backend-layout')

@section('title')
    Edit Gym
@endsection

@section('breadcrumb')
    Edit Gym
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
    <form method="post" action="{{ route('updateGym',['id'=>$userData->id])}}" autocomplete="off"
          enctype="multipart/form-data">
        @csrf

        <label class="form-label">Gym Id:</label>

        <input class="form-control" type="text" readonly value="{{$userData->gym_id}}" name="gym_id">
        <br>
        {{-- <input class="form-control" type="text" readonly value="1" name="gym_id">--}}
        <div class="mb-3">
            <label class="form-label">Gym Name</label>
            <input class="form-control" type="text" required=""
                   placeholder="Enter  Gym Name" name="gym_name" value="{{$userData->gym_name}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gym Logo</label>
            <input class="form-control" type="file"
                   placeholder="Gym Logo" name="gym_logo" value="{{$userData->gym_logo}}">
        </div>


        <div class="mb-3">
            <label class="form-label">Gym package</label>
            <select class="form-select mb-3" name="gym_package" required>
                <option selected value="{{$userData->gym_package}}">{{$userData->gym_package}}</option>
                <option value="free">Free</option>
                <option value="paid">Paid</option>

            </select>

        </div>
        <div class="mb-3">
            <label class="form-label">Message Api</label>
            <input class="form-control" type="text"
                   placeholder="Enter Gym api" name="message_api_key" value="{{$userData->message_api_key}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Package start</label>
            <input class="form-control" type="date"
                   placeholder="Gym package start date" name="gym_package_start_date"
                   value="{{$userData->gym_package_start_date}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Package end</label>
            <input class="form-control" type="date"
                   placeholder="Gym package end date" name="gym_package_end_date"
                   value="{{$userData->gym_package_end_date}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Gym City</label>
            <select class="form-select mb-3" name="gym_city" required>
                <option selected value="{{$userData->gym_city}}">{{$userData->gym_city}}</option>
                <option value="lahore">Lahore</option>

            </select>

            <input type="text" name="gym_title" hidden>
            <input type="text" name="gym_slug" hidden>
        </div>
        <div class="mb-3">
            <label class="form-label">Gym Area</label>
            <select class="form-select mb-3" name="gym_area" required>
                <option selected value="{{$userData->gym_area}}">{{$userData->gym_area}}</option>
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
            <input class="form-control" type="text" required=""
                   placeholder="Enter your User Name" name="name" value="{{$userData->name}}">
        </div>


        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input class="form-control" type="number" required=""
                   placeholder="User phone" name="phone" value="{{$userData->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input class="form-control" type="password"
                   placeholder="User password" name="password" value="{{$userData->password}}">
        </div>


        <div class="mb-3">
            <label class="form-label">Type</label>
            <input class="form-control" type="text"
                   placeholder="User Type" name="type" value="{{$userData->type}}" readonly>
        </div>

        <hr>
        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Update</button>
        </div>

    </form>

@endsection













{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="utf-8"/>--}}
{{--    <title>Sign Up</title>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>--}}
{{--    <meta content="Coderthemes" name="author"/>--}}
{{--    <!-- App favicon -->--}}
{{--    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">--}}

{{--    <!-- App css -->--}}
{{--    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>--}}

{{--</head>--}}

{{--<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>--}}
{{--<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-xxl-4 col-lg-5">--}}
{{--                <div class="card">--}}

{{--                    <!-- Logo -->--}}
{{--                    <div class="card-header pt-4 pb-4 text-center bg-primary">--}}
{{--                        <a href="index.html">--}}
{{--                            <span><img src="assets/images/logo.png" alt="" height="18"></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="card-body p-4">--}}


{{--                        <div class="text-center w-75 m-auto">--}}
{{--                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Update Gym Data</h4>--}}
{{--                        </div>--}}

{{--                        <form method="post" action="{{ route('createGym')}}" autocomplete="off"--}}
{{--                              enctype="multipart/form-data">--}}
{{--                            @csrf--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Gym Id:</label>--}}
{{--                                <input readonly class="form-control"  value={{$userData->gym_id}}>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Gym Name</label>--}}
{{--                                <input class="form-control" type="text" required=""--}}
{{--                                       placeholder="Enter  Gym Name" name="gym_name" value={{$userData->gym_name}}>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Gym Logo</label>--}}
{{--                                <input class="form-control" type="file"--}}
{{--                                       placeholder="Gym Logo" name="gym_logo">--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="text-center w-75 m-auto">--}}
{{--                                <h4 class="text-dark-50 text-center mt-0 fw-bold">User Data</h4>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">User Name</label>--}}
{{--                                <input class="form-control" type="text" required=""--}}
{{--                                       placeholder="Enter your User Name" name="name">--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Email</label>--}}
{{--                                <input class="form-control" type="email" required=""--}}
{{--                                       placeholder="User email" name="email">--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Phone</label>--}}
{{--                                <input class="form-control" type="number" required=""--}}
{{--                                       placeholder="User phone" name="phone">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">password</label>--}}
{{--                                <input class="form-control" type="password"--}}
{{--                                       placeholder="User password" name="password">--}}
{{--                            </div>--}}


{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Type</label>--}}
{{--                                <input class="form-control" type="text"--}}
{{--                                       placeholder="User Type" name="type" value="owner" readonly>--}}
{{--                            </div>--}}


{{--                            <hr>--}}
{{--                            <div class="mb-3 mb-0 text-center">--}}
{{--                                <button class="btn btn-primary" type="submit"> Sign Up</button>--}}
{{--                            </div>--}}

{{--                        </form>--}}
{{--                    </div> <!-- end card-body -->--}}
{{--                </div>--}}
{{--                <!-- end card -->--}}


{{--                <!-- end row -->--}}

{{--            </div> <!-- end col -->--}}
{{--        </div>--}}
{{--        <!-- end row -->--}}
{{--    </div>--}}
{{--    <!-- end container -->--}}
{{--</div>--}}
{{--<!-- end page -->--}}

{{--<footer class="footer footer-alt">--}}
{{--    <script>document.write(new Date().getFullYear())</script>--}}
{{--    © Fitness Zone--}}
{{--</footer>--}}

{{--<!-- bundle -->--}}
{{--<script src="{{asset('assets/js/vendor.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/app.min.js')}}"></script>--}}

{{--</body>--}}

{{--</html>--}}
