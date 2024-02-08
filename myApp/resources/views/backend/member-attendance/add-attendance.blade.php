@extends('layouts.backend-layout')


@section('title')
    Members list mark attendance
@endsection

@section('breadcrumb')
    Members list mark attendance

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

                                    <div class="input-group">


                                        <form action="{{route('updateMemberDate')}}" method="post" autocomplete="off">
                                            @csrf
                                            <input type="number" class="form-control" name="member_phone">
                                            <button class="btn  btn-info" type="submit">Find Old Member</button>

                                        </form>
                                    </div>
                                </tr>
                                <br><br>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')
                                        <th>phone</th>
                                    @endif
                                    <th>fee date</th>
                                    <th>Member Package</th>
                                    <th>Mark Att</th>
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

                                @foreach($memberData as $memberDataVar)

                                    <tr>

                                        <td>{{$memberDataVar->roll_no}}</td>

                                        <td>{{$memberDataVar->member_name}}</td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')

                                            <td>{{$memberDataVar->member_phone}}</td>
                                        @endif
                                        <td>{{(\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))}}</td>
                                        <td>
                                            @foreach($packageData as $packageDataVar)

                                                @if($memberDataVar->member_package == $packageDataVar->package_id)
                                                    {{$packageDataVar->package_amount}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{--  store member attendance into database--}}
                                            <form method="post" action="{{route('createMemberAttendance')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input name="belong_to_gym" hidden>

                                                <input name="member_id" value="{{$memberDataVar->roll_no}}" hidden>

                                                <input name="member_name" value="{{$memberDataVar->member_name}}"
                                                       hidden>
                                                <input name="member_phone" value="{{$memberDataVar->member_phone}}"
                                                       hidden>
                                                <input name="member_fee_end_date"
                                                       value="{{(\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))}}"
                                                       hidden>

                                                <input name="member_package"
                                                       value="{{$memberDataVar->member_package}}"
                                                       hidden>

                                                {{--   added 3 days to currrent date for fee warning--}}

                                                @if((Carbon\Carbon::now()->addDays(4)->format('Y-m-d')) >= ((\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))))

                                                    @if((Carbon\Carbon::now()->format('Y-m-d')) > (\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d')))

                                                        <button
                                                            style="background: black !important;color: orangered !important;"
                                                            type="submit"
                                                            class="btn btn-info">Mark Attendance
                                                        </button>
                                                    @else
                                                        <button
                                                            style="background: lightcoral !important;color: white !important;"
                                                            type="submit"
                                                            class="btn btn-info">Mark Attendance
                                                        </button>
                                                    @endif
                                                @else

                                                    <button
                                                        style="background: darkseagreen !important;color: white !important;"
                                                        type="submit"
                                                        class="btn btn-info">Mark Attendance
                                                    </button>
                                                @endif


                                            </form>

                                        </td>
                                        <td>
                                            {{--                                            only used for getting member id for attendance list--}}
                                            <form method="post" action="{{route('singleMemberAttendanceList')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input name="member_id" value="{{$memberDataVar->roll_no}}" hidden>
                                                @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")

                                                    <button type="submit"
                                                            class="btn btn-info">Attendance List
                                                    </button>
                                                @endif
                                            </form>

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

    <!-- end row-->

@endsection

