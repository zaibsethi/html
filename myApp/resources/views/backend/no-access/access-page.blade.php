@extends('layouts.backend-layout')


@section('title')

    No Access
@endsection
@section('breadcrumb')

    No Access
@endsection

@section('content')




    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <h1> No Access</h1>        </div>
        <!-- end row -->
        @if(session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                <strong>Success - </strong> {{session('danger')}}
            </div>
        @endif
    </div>
    <!-- end row -->

@endsection
