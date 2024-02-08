@extends('layouts.backend-layout')

@section('title')
    Edit Expense
@endsection

@section('breadcrumb')
    Edit Expense
@endsection

@section('content')
    <form method="post" action="{{route('updateExpense',['id'=>$expenseData->expense_id])}}" enctype="multipart/form-data"
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
            <label class="form-label" for="validationCustom01">expense Title</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter expense Title"
                   name="expense_title" required value="{{$expenseData->expense_title}}">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter expense title.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Amount </label>
            <input type="number" class="form-control" id="validationCustom02" placeholder="Enter expense Amount"
                   name="expense_amount" value="{{$expenseData->expense_amount}}" required>
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
                   name="expense_description" value="{{$expenseData->expense_description}}" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Update expense</button>
    </form>


@endsection
