@extends('layouts.backend-layout')


@section('title')
    Task list
@endsection

@section('breadcrumb')
    Task List

@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="alt-pagination-preview">
                            <table id="alternative-page-datatable"
                                   class="table table-striped dt-responsive nowrap w-100">

                                <thead>
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
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Assign</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($taskData as $taskDataVar)
                                        <tr>
                                            <td>{{$taskDataVar->id}}</td>
                                            <td>{{$taskDataVar->task_name}}</td>
                                            <td>{{$taskDataVar->assign}}</td>
                                            <td>{{$taskDataVar->task_date}}</td>
                                            <td>{{$taskDataVar->task_type}}</td>
                                            <td>{{$taskDataVar->status}}</td>
                                            <td>{{$taskDataVar->task_description}}</td>


                                            <td>
                                                <a class="btn btn-info"
                                                   href="{{route('updateStatus',['id'=>$taskDataVar->id])}}">Complete</a>
                                                <br>
                                                <a href="{{route('editTask',['id'=>$taskDataVar->id])}}"
                                                   class="action-icon">Edit <i
                                                        class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>



@endsection
