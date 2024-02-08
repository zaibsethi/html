@extends('layouts.backend-layout')

@section('title')
    Edit Package
@endsection

@section('breadcrumb')
    Edit Package
@endsection

@section('content')
    <form method="post" action="{{route('updatePackage',['id'=>$editPackageData->package_id])}}" enctype="multipart/form-data"
          class="needs-validation"
          novalidate autocomplete="off">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Package name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Package name"
                   name="package_name" required value="{{$editPackageData->package_name}}">
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
                   name="package_amount" value="{{$editPackageData->package_amount}}" required>
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
                   name="package_description" value="{{$editPackageData->package_description}}" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>


        <button class="btn btn-primary" type="submit">Update Package</button>
    </form>

@endsection
