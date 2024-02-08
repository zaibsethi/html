@extends('layouts.backend-layout')


@section('title')
    Salary History list
@endsection

@section('breadcrumb')
    Salary History List

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
                                    <th>Employee Name</th>
                                    <th>Employee phone</th>
                                    <th>package Amount</th>
                                    <th>Amount paid</th>
                                    <th>Salary Date</th>
                                    <th>Paid Date</th>

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

                                @foreach($salaryHistoryData as $salaryHistoryDataVar)
                                    <tr>

                                        <td>
                                            {{$salaryHistoryDataVar->employee_id}}
                                        </td>
                                        <td>                {{$salaryHistoryDataVar->employee_name}}
                                        </td>
                                        <td>                {{$salaryHistoryDataVar->employee_phone}}
                                        </td>
                                        <td>                {{$salaryHistoryDataVar->package_amount}}
                                        </td>
                                        <td>                {{$salaryHistoryDataVar->amount_received}}
                                        </td>
                                        <td>

                                            {{$salaryHistoryDataVar->employee_salary_end_date}}
                                        </td>
                                        <td>
                                            {{--                                            get created_at with time and convert into only date--}}

                                            <input value="{{$receivedDate =$salaryHistoryDataVar->created_at}}  hidden>
                                            <input value="{{$receivedVar =  Carbon\Carbon::parse($receivedDate)->format('Y-m-d')}}
                                            "
                                            hidden>

                                            {{$receivedVar}}</td>
                                        </td>

                                    </tr>
                                @endforeach                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                        <!-- end preview code-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>






@endsection
