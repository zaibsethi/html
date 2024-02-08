@extends('layouts.backend-layout')


@section('title')

    Reports
@endsection
@section('breadcrumb')

    Reports
@endsection

@section('content')


    <div class="container">
        <br>

        <div class="row">
            <div class="col-md-6">
                <a href="{{route('activeMembersList')}}" style="width: 50% !important;"
                   class="btn btn-success btn-lg btn-block btn-huge"
                   target="_blank">Active
                    Members</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('defaulterMembersList')}}" style="width: 50% !important;"
                   class="btn btn-success btn-lg btn-block btn-huge"
                   target="_blank">Defaulter
                    Members</a></div>
            {{--            <div class="col-md-3">--}}
            {{--                <a href="#" class="btn btn-success btn-lg btn-block btn-huge" target="_blank">Test button</a>--}}
            {{--            </div>--}}
            {{--            <div class="col-md-3">--}}
            {{--                <a href="#" class="btn btn-success btn-lg btn-block btn-huge" target="_blank">Test button</a>--}}
            {{--            </div>--}}
        </div>
        <br>
        <div class="row">

            <div class="col-md-6">
                <a href="{{route('employeeAttendanceList')}}" class="btn btn-info btn-lg btn-block btn-huge"
                   style="width: 50% !important;color: white !important;"
                   target="_blank">Employee Attendance</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('memberAttendanceReport')}}" style="width: 50% !important;"
                   class="btn btn-info btn-lg btn-block btn-huge" target="_blank">Member Attendance</a>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('incomeReport')}}" style="width: 50% !important;"
                   class="btn btn-secondary btn-lg btn-block btn-huge" target="_blank">Income
                    Report</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('expenseReport')}}" class="btn btn-secondary btn-lg btn-block btn-huge"
                   style="width: 50% !important;"
                   target="_blank">Expense Report</a>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('dailyMemberAttendance')}}" style="width: 50% !important;"
                   class="btn btn-secondary btn-lg btn-block btn-huge" target="_blank">Daily Member Attendance
                    </a>
            </div>
            <div class="col-md-6">
                <a href="{{route('dailyEmployeeAttendance')}}" class="btn btn-secondary btn-lg btn-block btn-huge"
                   style="width: 50% !important;"
                   target="_blank">Daily Employee Att</a>
            </div>

        </div>

    </div>

@endsection
