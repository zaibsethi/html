{{--@extends('layouts.backend-layout')--}}


{{--@section('title')--}}
{{--   Mark attendance--}}
{{--@endsection--}}

{{--@section('breadcrumb')--}}
{{--    Mark attendance--}}

{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}

{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="tab-content">--}}
{{--                        @if(session()->has('success'))--}}



{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                <h4 class="alert-heading"><strong>Success - </strong>{{session('success')}}</h4>--}}

{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if(session()->has('danger'))--}}



{{--                            <div class="alert alert-danger" role="alert">--}}
{{--                                <h4 class="alert-heading"><strong>Success - </strong>{{session('danger')}}</h4>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="tab-pane show active">--}}
{{--                                <h3>Attendance By ID:</h3><br>--}}
{{--                                <form action="{{route('createMemberAttendanceById')}}" method="post" autocomplete="off">--}}
{{--                                    @csrf--}}
{{--                                    <input name="belong_to_gym" hidden>--}}

{{--                                    <input type="number" class="form-control" name="member_id"><br>--}}
{{--                                    <button class="btn  btn-info" type="submit">Mark Attendance</button>--}}

{{--                                </form>--}}

{{--                            <hr>--}}

{{--                                <h3>Find Old Member:</h3><br>--}}

{{--                                <form action="{{route('updateMemberFeeDate')}}" method="post" autocomplete="off">--}}
{{--                                    @csrf--}}
{{--                                    <input type="number" class="form-control" name="member_phone"><br>--}}
{{--                                    <button class="btn  btn-info" type="submit">Find Old Member</button>--}}

{{--                                </form>--}}


{{--                            <!-- end preview-->--}}

{{--                    </div> <!-- end tab-content-->--}}

{{--                </div> <!-- end card body-->--}}
{{--            </div> <!-- end card -->--}}
{{--        </div><!-- end col-->--}}
{{--    </div>--}}

{{--    <!-- end row-->--}}

{{--@endsection--}}



{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <title>Members List</title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    --}}{{----}}{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    --}}{{----}}{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    --}}{{----}}{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}


{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

{{--    <style>--}}
{{--        .search-table {--}}
{{--            padding: 10%;--}}
{{--            margin-top: -6%;--}}
{{--        }--}}

{{--        .search-box {--}}
{{--            background: #c1c1c1;--}}
{{--            border: 1px solid #ababab;--}}
{{--            padding: 3%;--}}
{{--        }--}}

{{--        .search-box input:focus {--}}
{{--            box-shadow: none;--}}
{{--            border: 2px solid #eeeeee;--}}
{{--        }--}}

{{--        .search-list {--}}
{{--            background: #fff;--}}
{{--            border: 1px solid #ababab;--}}
{{--            border-top: none;--}}
{{--        }--}}

{{--        .search-list h3 {--}}
{{--            background: #eee;--}}
{{--            padding: 3%;--}}
{{--            margin-bottom: 0%;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container search-table">--}}
{{--    <div class="search-box">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3">--}}
{{--                <h6>ATTENDANCE LIST</h6>--}}
{{--            </div>--}}
{{--            <div class="col-md-9">--}}
{{--                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"--}}
{{--                       placeholder="Search all Members">--}}
{{--                <script>--}}
{{--                    $(document).ready(function () {--}}
{{--                        $("#myInput").on("keyup", function () {--}}
{{--                            var value = $(this).val().toLowerCase();--}}
{{--                            $("#myTable tr").filter(function () {--}}
{{--                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)--}}
{{--                            });--}}
{{--                        });--}}
{{--                    });--}}
{{--                </script>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="search-list" style="overflow-y:auto; height: 1000px !important;">--}}

{{--        <table class="table" id="myTable">--}}

{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Picture</th>--}}
{{--                <th>Mem Qr</th>--}}
{{--                <th>Name</th>--}}
{{--                @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')--}}

{{--                    <th>phone</th>--}}
{{--                @endif--}}
{{--                <th>fee date</th>--}}
{{--                <th>Member Package</th>--}}
{{--                <th>Mark Att</th>--}}
{{--                <th>Att List</th>--}}

{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

{{--            @if(session()->has('success'))--}}



{{--                <div class="alert alert-success" role="alert">--}}
{{--                    <h4 class="alert-heading"><strong>Success - </strong>{{session('success')}}</h4>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if(session()->has('danger'))--}}



{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    <h4 class="alert-heading"><strong>Success - </strong>{{session('danger')}}</h4>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @foreach($memberData as $memberDataVar)--}}
{{--                {{dd($memberDataVar->member_fee_end_date)}}--}}


{{--                <tr>--}}

{{--                    <td>{{$memberDataVar->id}}</td>--}}

{{--                    <td>--}}
{{--                        @if($memberDataVar->image == null)--}}
{{--                            if there is no pic then default will display--}}
{{--                            <img class="img-responsive  img-thumbnail"--}}
{{--                                 style="height: 120px; width: 120px"--}}
{{--                                 src="{{ asset('backend/images/black_member_profile_picture.jpg') }}"--}}
{{--                                 @else--}}
{{--                                 if getting pic from database--}}
{{--                            <img class="img-responsive  img-thumbnail"--}}
{{--                                 style="height: 120px; width: 120px"--}}
{{--                                 src="{{asset('/backend/images/member/profile/'.$memberDataVar->image)}}">--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>{!! QrCode::generate($memberDataVar->id); !!}--}}

{{--                    <td>{{$memberDataVar->member_name}}</td>--}}
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')--}}

{{--                        <td>{{$memberDataVar->member_phone}}</td>--}}
{{--                    @endif--}}
{{--                    <td>{{(\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))}}</td>--}}
{{--                    <td>--}}
{{--                        @foreach($packageData as $packageDataVar)--}}

{{--                            @if($memberDataVar->member_package == $packageDataVar->id)--}}
{{--                                {{$packageDataVar->package_amount}}--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        store member attendance into database--}}
{{--                        <form method="post" action="{{route('createMemberAttendance')}}"--}}
{{--                              enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input name="member_id" value="{{$memberDataVar->id}}" hidden>--}}

{{--                            <input name="member_name" value="{{$memberDataVar->member_name}}"--}}
{{--                                   hidden>--}}
{{--                            <input name="member_phone" value="{{$memberDataVar->member_phone}}"--}}
{{--                                   hidden>--}}
{{--                            <input name="member_fee_end_date"--}}
{{--                                   value="{{(\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))}}"--}}
{{--                                   hidden>--}}

{{--                            <input name="member_package"--}}
{{--                                   value="{{$memberDataVar->member_package}}"--}}
{{--                                   hidden>--}}

{{--                            added 3 days to currrent date for fee warning--}}

{{--                            @if((Carbon\Carbon::now()->addDays(4)->format('Y-m-d')) >= ((\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d'))))--}}


{{--                                @if((Carbon\Carbon::now()->format('Y-m-d')) > (\Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d')))--}}




{{--                                    <button--}}
{{--                                        style="background: black !important;color: orangered !important;"--}}
{{--                                        type="submit"--}}
{{--                                        class="btn btn-info">Mark Attendance--}}
{{--                                    </button>--}}
{{--                                @else--}}
{{--                                    <button--}}
{{--                                        style="background: lightcoral !important;color: white !important;"--}}
{{--                                        type="submit"--}}
{{--                                        class="btn btn-info">Mark Attendance--}}
{{--                                    </button>--}}
{{--                                @endif--}}
{{--                            @else--}}

{{--                                <button--}}
{{--                                    style="background: darkseagreen !important;color: white !important;"--}}
{{--                                    type="submit"--}}
{{--                                    class="btn btn-info">Mark Attendance--}}
{{--                                </button>--}}
{{--                            @endif--}}


{{--                        </form>--}}

{{--                    </td>--}}
{{--                    <td>--}}
{{--                        only used for getting member id for attendance list--}}
{{--                        <form method="post" action="{{route('singleMemberAttendanceList')}}"--}}
{{--                              enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input name="member_id" value="{{$memberDataVar->id}}" hidden>--}}
{{--                            @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")--}}

{{--                                <button type="submit"--}}
{{--                                        class="btn btn-info">Attendance List--}}
{{--                                </button>--}}
{{--                            @endif--}}
{{--                        </form>--}}

{{--                    </td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--    </div>--}}
{{--</div>--}}


{{--</body>--}}
{{--</html>--}}
