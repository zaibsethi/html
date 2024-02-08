@extends('layouts.backend-layout')


@section('title')

    Defaulter Members List
@endsection
@section('breadcrumb')

    Defaulter Members List
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
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Fee Date</th>
                                    <th>Shift</th>
{{--                                    <th>Package</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activeMembers as $defaulterMembersVar)
                                    @if($defaulterMembersVar->member_fee_end_date  < $currentDate)
                                        <tr>
                                            <td>
                                                {{$defaulterMembersVar->roll_no}}
                                            </td>
                                            <td>
                                                {{$defaulterMembersVar->member_name}}
                                            </td>
                                            <td>                {{$defaulterMembersVar->member_fee_end_date}}
                                            </td>
                                            <td>{{$defaulterMembersVar->member_shift}}</td>
{{--                                            <td><a href="{{route('packagesList')}}"--}}
{{--                                                   target="_blank">{{$defaulterMembersVar->member_package}}</a>--}}
{{--                                            </td>--}}

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
