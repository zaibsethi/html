@extends('layouts.backend-layout')

@section('title')
    Edit Task
@endsection

@section('breadcrumb')
    Edit Task
@endsection

@section('content')
    <form method="post" action="{{route('updateTask',['id'=>$taskData->id])}}" enctype="multipart/form-data"
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
            <label class="form-label" for="validationCustom01">Task name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter task name"
                   name="task_name" value="{{$taskData->task_name}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter task name.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Assign</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Enter name"
                   name="assign" value="{{$taskData->assign}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter value.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Task Date</label>
            <input type="date" class="form-control" id="validationCustom02" placeholder="Enter Duration"
                   name="task_date" value="{{$taskData->task_date}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter Date.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Task Type</label>

            <select class="form-select mb-3" name="task_type" id="validationCustom02" required>
                <option selected value="{{$taskData->task_type}}">{{$taskData->task_type}}</option>
                <option value="one_time">One Time</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter TYpe.
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="validationCustom03">Description</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Enter Description"
                   name="task_description" value="{{$taskData->task_description}}" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>

        <input name="status" type="text" value="pending" hidden>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>


@endsection
