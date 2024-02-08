@extends('layouts.backend-layout')


@section('title')
    Employee list mark attendance
@endsection

@section('breadcrumb')
    Employee list mark attendance

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
                                    <th>ID</th>
{{--                                    <th>Picture</th>--}}
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>salary date</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Att List</th>
                                </tr>
                                </thead>


                                <tbody>

                                @if(session()->has('success'))



                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading"><strong>Success - </strong>{{session('success')}}</h4>
                                        <hr>
                                    </div>
                                @endif

                                @if(session()->has('danger'))



                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading"><strong>Success - </strong>{{session('danger')}}</h4>
                                        <hr>
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

{{--                                            <td>--}}
{{--                                                @if($employeeDataVar->image == null)--}}
{{--                                                    --}}{{--                                                          if there is no pic then default will display--}}
{{--                                                    <img class="img-responsive  img-thumbnail"--}}
{{--                                                         style="height: 120px; width: 120px"--}}
{{--                                                         src="{{ asset('backend/images/black_employee_profile_picture.jpg') }}"--}}
{{--                                                @else--}}
{{--                                                    --}}{{--                                                            if getting pic from database--}}
{{--                                                    <img class="img-responsive  img-thumbnail"--}}
{{--                                                         style="height: 120px; width: 120px"--}}
{{--                                                         src="{{asset('/backend/images/employee/profile/'.$employeeDataVar->image)}}">--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                            <td>{{$employeeDataVar->employee_name}}</td>
                                            <td>{{$employeeDataVar->employee_phone}}</td>
                                            <td>{{$employeeDataVar->employee_salary_end_date}}</td>

                                            <td>
                                                {{--                                                store employee attendance into database--}}
                                                <form method="post" action="{{route('createEmployeeAttendance')}}"
                                                      enctype="multipart/form-data">
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

                                                    <input name="employee_package"
                                                           value="{{$employeeDataVar->employee_package}}"
                                                           hidden>

                                                    {{--                                                                 added 3 days to currrent date for fee warning--}}
                                                    @if((Carbon\Carbon::parse(now())->addDays(4)->format('Y-m-d') ) >= ($employeeDataVar->employee_salary_end_date))



                                                        @if((Carbon\Carbon::parse(now())->format('Y-m-d')) >= ($employeeDataVar->employee_salary_end_date))




                                                            <button
                                                                style="background: black !important;color: orangered !important;"
                                                                type="submit"
                                                                class="btn btn-info">Check In
                                                            </button>
                                                        @else
                                                            <button
                                                                style="background: lightcoral !important;color: white !important;"
                                                                type="submit"
                                                                class="btn btn-info">Check In
                                                            </button>
                                                        @endif
                                                    @else


                                                        <button
                                                            style="background: darkseagreen !important;color: white !important;border: none"
                                                            type="submit"
                                                            class="btn btn-info">Check In
                                                        </button>



                                                    @endif


                                                </form>

                                            </td>
                                            <td>
                                                {{--                                                    // for updating employee check out time--}}
                                                <form method="post"
                                                      action="{{route('updateEmployeeAttendance')}}">
                                                    {{csrf_field()}}
                                                    <input hidden name="employee_name"
                                                           value="{{$employeeDataVar->employee_name}}">


                                                    <button
                                                        style="background: darkseagreen !important;color: white !important; border: none"
                                                        type="submit"
                                                        class="btn btn-info">Check Out
                                                    </button>

                                                </form>
                                            </td>
                                            @if(Illuminate\Support\Facades\Auth::user()->type == 'owner')
                                            <td>

                                                {{--                                                only used for getting employee id for attendance list--}}
                                                <form method="post" action="{{route('singleEmployeeAttendanceList')}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <input name="employee_id" value="{{$employeeDataVar->employee_id}}" hidden>

                                                    <button type="submit"
                                                            class="btn btn-info">Attendance List
                                                    </button>
                                                </form>

                                            </td>
                                                @endif
                                            <td>
                                        </tr>

                                    @endif
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

