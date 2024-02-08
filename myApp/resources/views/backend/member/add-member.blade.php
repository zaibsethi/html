@extends('layouts.backend-layout')

@section('title')
    Add New Member
@endsection

@section('breadcrumb')
    Add New Member
@endsection

@section('content')

    <form method="post" action="{{route('createMember')}}" enctype="multipart/form-data" class="needs-validation"
          onload="addEndDate()"
          autocomplete="off" novalidate>
        @csrf
        <input name="belong_to_gym" hidden>


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


        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Member ID</label>
                    {{--   getting id from db for autoincrement --}}
                    <input type="text" style="color: #526be2 !important;" name="roll_no" value="{{$id +  1}}"
                           class="form-control"
                           disabled>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Select Package</label>

                    <select class="form-select mb-3" name="member_package" required>
                        <option selected value="">Select Package</option>
                        @foreach($getPackageData as $getPackageDataVar)
                            <option
                                value="{{$getPackageDataVar->package_id}}">{{$getPackageDataVar->package_name}}</option>

                        @endforeach

                    </select>

                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select package.
                    </div>
                </div>


            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="validationCustom01">Member name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Enter name"
                           name="member_name"
                           required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter member name.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="validationCustom02">Phone Number</label>
                    <input type="number" class="form-control" id="validationCustom02" placeholder="Enter Phone Number"
                           name="member_phone" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter Phone Number.
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Gender</label>

                <select class="form-select mb-3" name="member_gender" required>
                    <option selected value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>

                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please select blood group.
                </div>
            </div>

            <div class="col-lg-6">
                <label class="form-label">Blood group</label>

                <select class="form-select mb-3" name="member_blood_group">
                    <option selected value="">Select group</option>
                    {{--                    <option value="unknown">Unknown</option>--}}
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please select blood group.
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Single Date Picker -->
                <div class="mb-3">
                    <label class="form-label">Joining Date</label>
                    <input type="text" class="form-control date"
                           data-toggle="date-picker" name="member_joining_date" data-single-date-picker="true" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select joining date.
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Fee Date</label>
                    <input type="text" class="form-control date" data-toggle="date-picker"
                           id="member_fee_start_date" data-single-date-picker="true" name="member_fee_start_date"
                           onchange="addEndDate()" required>

                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select fee date.
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control date" data-toggle="date-picker"
                   data-single-date-picker="true" name="member_fee_end_date" id="member_fee_end_date" required>

            <input type="hidden" name="member_shift" value="evening" required>
        </div>

        <div class="row">
            <div class="col-lg-6">

                <div class="mb-3">
                    <label for="example-textarea" class="form-label">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Address"
                              name="member_address"></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter address.
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="mb-3">
                    <label for="example-textarea" class="form-label">PEMC</label>
                    <textarea class="form-control" id="example-textarea" rows="3" name="member_pemc"
                              placeholder="Enter Pre-Existing Medical Condition"></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter Pre-Existing Medical Condition.
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Add Member</button>
    </form>

    <script>

        function addEndDate() {
            // fee end date will be same to fee start date
            startDate = document.getElementById("member_fee_start_date").value;
            // console.log('startDate');
            document.getElementById("member_fee_end_date").value = startDate;
        }

    </script>

@endsection
