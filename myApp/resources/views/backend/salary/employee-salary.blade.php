@extends('layouts.backend-layout')


@section('title')
    Employee Salary  list
@endsection

@section('breadcrumb')
    Employee Salary List

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
                                    <th>phone</th>
                                    <th>Salary date</th>
                                    <th>Package Amount</th>
                                    <th>Pay Salary</th>
                                    <th>Salary History</th>
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
                                    <div style="visibility: hidden">
                                        <input value="{{$currentDate  =Carbon\Carbon::now()->addMonth(-2)}}" hidden>
                                    </div>
                                    @if(($employeeDataVar->employee_salary_end_date . " " . "00:00:00") > ($currentDate))

                                        <tr>
                                            <td>{{$employeeDataVar->employee_id}}</td>


                                            <td>{{$employeeDataVar->employee_name}}</td>
                                            <td>{{$employeeDataVar->employee_phone}}</td>
                                            <td>
                                                {{--                                            get employee_salary_end_date with time and convert into only date--}}
                                                <input
                                                    value="{{$targetDate =$employeeDataVar->employee_salary_end_date}}  hidden>
                                            <input value="{{$d =  Carbon\Carbon::parse($targetDate)->format('Y-m-d')}}"
                                                hidden>

                                                {{$d}}

                                                <br>

                                                {{--         get employee_salary_end_date and  compare with current date with 30days difference for updating employee salary date--}}
                                                <input
                                                    value="{{$currentDate =Carbon\Carbon::parse(date('Y-m-d'))}}"
                                                    hidden> <input
                                                    value="{{$endDate =Carbon\Carbon::parse($employeeDataVar->employee_salary_end_date)->addDays(15)}}"
                                                    hidden>
                                                {{--                                            <input--}}
                                                {{--                                                value="{{$endDate =Carbon\Carbon::parse($employeeDataVar->employee_salary_end_date)}}"--}}
                                                {{--                                                hidden>--}}

                                                {{--                                            <input value="{{$diff_in_days=$currentDate->diffInDays($endDate)}}" hidden>--}}
                                                {{--                                            {{dd($diff_in_days < 30)}}--}}

                                                @if($endDate <= $currentDate)
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#signup-modal">Update Date
                                                    </button>
                                                    <!-- update employee salary modal-->
                                                    <div id="signup-modal" class="modal fade" tabindex="-1"
                                                         role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <div class="text-center mt-2 mb-4">
                                                                        @if($employeeDataVar->image == null)
                                                                            {{--      if there is no pic then default will display--}}

                                                                            <img
                                                                                class="img-responsive  img-thumbnail"
                                                                                style="height: 120px; width: 120px"
                                                                                src="{{ asset('backend/images/black_employee_profile_picture.jpg') }}">
                                                                        @else
                                                                            {{--        if getting pic from database--}}

                                                                            <img
                                                                                class="img-responsive  img-thumbnail"
                                                                                style="height: 120px; width: 120px"
                                                                                src="{{asset('/backend/images/employee/profile/'.$employeeDataVar->image)}}">
                                                                        @endif
                                                                    </div>
                                                                    <form class="ps-3 pe-3"
                                                                          action="{{route('updateEmployee',['id'=>$employeeDataVar->id])}}"
                                                                          method="post">
                                                                        @csrf


                                                                        <div class="mb-3">
                                                                            <label class="form-label">salary
                                                                                Date</label>
                                                                            <input type="date" class="form-control "
                                                                                   name="employee_salary_end_date"
                                                                                   required>

                                                                            <div class="valid-salarydback">
                                                                                Looks good!
                                                                            </div>
                                                                            <div class="invalid-salarydback">
                                                                                Please select salary date.
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 text-center">
                                                                            <button class="btn btn-primary"
                                                                                    type="submit">
                                                                                Update employee
                                                                            </button>
                                                                        </div>
                                                                        <input name="employee_name"
                                                                               value="{{$employeeDataVar->employee_name}}"
                                                                               hidden>
                                                                        <input name="employee_phone"
                                                                               value="{{$employeeDataVar->employee_phone}}"
                                                                               hidden>
                                                                        <input name="employee_gender"
                                                                               value="{{$employeeDataVar->employee_gender}}"
                                                                               hidden>
                                                                        <input name="employee_blood_group"
                                                                               value="{{$employeeDataVar->employee_blood_group}}"
                                                                               hidden>
                                                                        <input name="employee_joining_date"
                                                                               value="{{$employeeDataVar->employee_joining_date}}"
                                                                               hidden>
                                                                    </form>

                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                @endif

                                            </td>

                                            <td>
                                                @foreach($packageData as $packageDataVar)
                                                    @if($packageDataVar->salary_package_id == $employeeDataVar->employee_package)
                                                        {{--                                                    get all packages data--}}
                                                        <span>{{$packageDataVar->package_amount}}</span>
                                                        <input type="hidden" name="amount_received"
                                                               value="{{$packageDataVar->package_amount}}">
                                                        <input type="hidden"
                                                               value=" {{$store = $packageDataVar->package_amount}}"
                                                               hidden>
                                            @endif
                                            @endforeach
                                            <td>
                                                {{--                                            form for storing data into create salary--}}
                                                <form action="{{route('createSalary',['id'=>$employeeDataVar->id])}}"
                                                      method="post">
                                                    @csrf
                                                    <input name="belong_to_gym" hidden>

                                                    <input name="employee_id" value="{{$employeeDataVar->employee_id}}" hidden>
                                                    <input name="employee_name"
                                                           value="{{$employeeDataVar->employee_name}}"
                                                           hidden>
                                                    <input name="employee_phone"
                                                           value="{{$employeeDataVar->employee_phone}}"
                                                           hidden>

                                                    <input name="employee_salary_end_date"
                                                           value="{{$employeeDataVar->employee_salary_end_date}}"
                                                           hidden>
                                                    <input name="package_amount" value="{{$store}}"
                                                           hidden>
                                                    <input name="amount_received" value="{{$store}}"
                                                           hidden>

                                                    {{--         get employee_salary_end_date and  compare with current date with 30days difference for updating employee salary date--}}
                                                    <input
                                                        value="{{$currentDate =Carbon\Carbon::parse(date('Y-m-d'))}}"
                                                        hidden> <input
                                                        value="{{$endDate =Carbon\Carbon::parse($employeeDataVar->employee_salary_end_date)->addDays(15)}}"
                                                        hidden>
                                                    @if($endDate > $currentDate)

                                                        <button type="submit" class="btn btn-info">Pay salary</button>
                                                    @else
                                                        <button class="btn btn-danger" disabled>Update salary</button>

                                                    @endif
                                                </form>
                                            <td>
                                                {{--                                            form for sending employee->id for salary history for this employee--}}

                                                <form method="post"
                                                      action="{{route('salaryHistory')}}">
                                                    @csrf
                                                    <input name="employee_id" value="{{$employeeDataVar->employee_id}}"
                                                           hidden>
                                                    <button type="submit" class="btn btn-success">Salary History
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>


                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                        <!-- end row-->

@endsection
