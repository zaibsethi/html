@extends('layouts.backend-layout')

@section('title')
    Add Thing
@endsection

@section('breadcrumb')
    Add Thing
@endsection

@section('content')
    <form method="post" action="{{route('createThing')}}" enctype="multipart/form-data" class="needs-validation"
          novalidate autocomplete="off">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success - </strong> {{session('success')}}
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                <strong>Alert - </strong> {{session('danger')}}
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
        <input name="belong_to_gym" hidden>

        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Member Phone</label>
            <input type="number" class="form-control" id="validationCustom01" placeholder="Enter ember phone number"
                   name="member_phone" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter member phone number.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Category </label>

            <select class="form-select mb-3" name="member_thing_category" required>
                <option selected value="">Select group</option>
                <option value="shoes">Shoes</option>
                <option value="cloths">Cloths</option>
                <option value="other">Other</option>
            </select>


            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter Category.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom03">Description</label>
            <input type="text" class="form-control" placeholder="Enter Description"
                   name="member_thing_description">

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Add Thing</button>
    </form>


@endsection
