@extends('layouts.backend-layout')

@section('title')
    Add Expense
@endsection

@section('breadcrumb')
    Add Expense
@endsection

@section('content')
    <form method="post" action="{{route('createExpense')}}" enctype="multipart/form-data" class="needs-validation"
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
            <label class="form-label" for="validationCustom01">Expense Title</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Expense title"
                   name="expense_title" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter Expense title.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Amount </label>
            <input type="number" class="form-control" id="validationCustom02" placeholder="Enter Expense Amount"
                   name="expense_amount" required>
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
                   name="expense_description" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>
        <input name="belong_to_gym" hidden>
        <button class="btn btn-primary" type="submit">Add Expense</button>
    </form>


@endsection
