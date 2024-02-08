@extends('layouts.backend-layout')


@section('title')
    Members Fee  list
@endsection

@section('breadcrumb')
    Members Fee List

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
                                    <th>Name</th>
                                    <th>fee date</th>
                                    <th>Package Amount</th>
                                    <th>Collect Fee</th>
                                    <th>Fee History</th>
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

                                @foreach($memberData as $memberDataVar)
                                    <div style="visibility: hidden">
                                        <input value="{{$currentDate  = Carbon\Carbon::now()->subDay(20)}}" hidden>
                                    </div>
                                    @if(($memberDataVar->member_fee_end_date . " " . "00:00:00") > ($currentDate))

                                        <tr>
                                            <td>{{$memberDataVar->roll_no}}</td>
                                            <td>{{$memberDataVar->member_name}}</td>
                                            <td>
                                                {{Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->format('Y-m-d')}}
                                                <br>
                                                {{--  get member_fee_end_date and  compare with current date with 30days difference for updating member fee date--}}
                                                <input
                                                    value="{{$currentDate =Carbon\Carbon::parse(now()->format('Y-m-d'))}}"
                                                    hidden> <input
                                                    value="{{$endtDate =Carbon\Carbon::parse($memberDataVar->member_fee_end_date)->addDays(10)}}"
                                                    hidden>
                                                @if($endtDate <= $currentDate)
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#signup-modal">Update Date
                                                    </button>
                                                    <!-- update member fee modal-->
                                                    <div id="signup-modal" class="modal fade" tabindex="-1"
                                                         role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <div class="text-center mt-2 mb-4">
                                                                        @if($memberDataVar->image == null)
                                                                            {{--      if there is no pic then default will display--}}

                                                                            <img
                                                                                class="img-responsive  img-thumbnail"
                                                                                style="height: 120px; width: 120px"
                                                                                src="{{ asset('backend/images/black_member_profile_picture.jpg') }}">
                                                                        @else
                                                                            {{--        if getting pic from database--}}
                                                                            <img
                                                                                class="img-responsive  img-thumbnail"
                                                                                style="height: 120px; width: 120px"
                                                                                src="{{asset('/backend/images/member/profile/'.$memberDataVar->image)}}">
                                                                        @endif
                                                                    </div>
                                                                    <form class="ps-3 pe-3"
                                                                          action="{{route('updateMember',['id'=>$memberDataVar->id])}}"
                                                                          method="post">
                                                                        @csrf


                                                                        <div class="mb-3">
                                                                            <label class="form-label">Fee
                                                                                Date</label>
                                                                            <input type="date" class="form-control "
                                                                                   name="member_fee_end_date"
                                                                                   required>

                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                            <div class="invalid-feedback">
                                                                                Please select fee date.
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 text-center">
                                                                            <button class="btn btn-primary"
                                                                                    type="submit">
                                                                                Update Member
                                                                            </button>
                                                                        </div>
                                                                        <input name="member_name"
                                                                               value="{{$memberDataVar->member_name}}"
                                                                               hidden>
                                                                        <input name="member_phone"
                                                                               value="{{$memberDataVar->member_phone}}"
                                                                               hidden>
                                                                        <input name="member_gender"
                                                                               value="{{$memberDataVar->member_gender}}"
                                                                               hidden>
                                                                        <input name="member_blood_group"
                                                                               value="{{$memberDataVar->member_blood_group}}"
                                                                               hidden>
                                                                        <input name="member_joining_date"
                                                                               value="{{$memberDataVar->member_joining_date}}"
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
                                                    @if($packageDataVar->package_id == $memberDataVar->member_package)
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
                                                {{--                                            form for storing data into create fee--}}
                                                <form action="{{route('createFee',['id'=>$memberDataVar->id])}}"
                                                      method="post">
                                                    @csrf
                                                    <input name="belong_to_gym" hidden>

                                                    <input name="member_id" value="{{$memberDataVar->roll_no}}" hidden>
                                                    <input name="member_name" value="{{$memberDataVar->member_name}}"
                                                           hidden>
                                                    <input name="member_phone" value="{{$memberDataVar->member_phone}}"
                                                           hidden>

                                                    <input name="member_fee_end_date"
                                                           value="{{$memberDataVar->member_fee_end_date}}"
                                                           hidden>
                                                    <input name="package_amount" value="{{$store}}"
                                                           hidden>
                                                    <input name="amount_received" value="{{$store}}"
                                                           hidden>

                                                    {{--         get member_fee_end_date and  compare with current date with 30days difference for updating member fee date--}}
                                                    <input
                                                        value="{{$currentDate =date('Y-m-d', strtotime(now()->subDay(10)))}}"
                                                        hidden> <input
                                                        value="{{$endtDate =date('Y-m-d', strtotime($memberDataVar->member_fee_end_date))}}"
                                                        hidden>

                                                    @if($endtDate > $currentDate)

                                                        <button type="submit" class="btn btn-info">Collect Fee</button>
                                                    @else
                                                        {{--                                                        <button class="btn btn-danger" disabled>Update Fee</button>--}}
                                                        <button type="submit" class="btn btn-danger">Collect late Fee
                                                        </button>

                                                    @endif
                                                </form>
                                            </td>

                                            <td>
                                                {{--                                            form for sending member->id for fee history for this member--}}
                                                @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")

                                                    <form method="post"
                                                          action="{{route('feeHistory')}}">
                                                        @csrf
                                                        <input name="member_id" value="{{$memberDataVar->roll_no}}"
                                                               hidden>
                                                        <button type="submit" class="btn btn-success">Fee History
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>


                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                        <!-- end row-->

@endsection
