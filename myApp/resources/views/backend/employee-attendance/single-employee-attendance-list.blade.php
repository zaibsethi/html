@extends('layouts.backend-layout')


@section('title')
    Employee Attendance list
@endsection

@section('breadcrumb')
    Employee Attendance list

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

                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Salary Date</th>
                                </tr>
                                </thead>


                                <tbody>
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

                                @foreach($employeeData as $employeeDataVar)



                                    <tr>
                                        <td>{{$employeeDataVar->employee_id}}</td>


                                        <td>{{$employeeDataVar->employee_name}}</td>
                                        <td>


                                            {{$employeeDataVar->created_at}}</td>
                                        <td>
                                            {{-- compare if check out marked or not --}}
                                            @if($employeeDataVar->updated_at == "2022-07-01 00:00:00")

                                                <span>{{'Check Out not marked'}}</span>
                                            @else

                                                {{$employeeDataVar->updated_at}}

                                            @endif
                                        </td>
                                        <td>{{$employeeDataVar->employee_salary_end_date}}</td>

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

    <!-- end row-->

@endsection
