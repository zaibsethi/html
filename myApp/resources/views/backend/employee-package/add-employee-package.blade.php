@extends('layouts.backend-layout')

@section('title')
    Add Employee Package
@endsection

@section('breadcrumb')
    Add Employee Package
@endsection

@section('content')
    <form method="post" action="{{route('createEmployeePackage')}}" enctype="multipart/form-data"
          class="needs-validation"
          novalidate autocomplete="off">
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
        @csrf
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Package name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Package name"
                   name="package_name" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter package name.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Amount </label>
            <input type="number" class="form-control" id="validationCustom02" placeholder="Enter Package Amount"
                   name="package_amount" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter amount.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom03">Description</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Enter Description"
                   name="package_description" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>
        <input name="belong_to_gym" hidden>
        <button class="btn btn-primary" type="submit">Add Package</button>
    </form>


@endsection
