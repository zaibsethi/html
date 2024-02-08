@extends('layouts.backend-layout')

@section('title')
    Edit Member
@endsection

@section('breadcrumb')
    Edit Member
@endsection

@section('content')

    <form method="post" action="{{route('updateMember',['id'=>$memberDataByID->roll_no])}}" enctype="multipart/form-data"
          class="needs-validation"
          autocomplete="off" novalidate>
        @csrf

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
                    <input type="text" style="color: #526be2 !important;" value="{{$memberDataByID->roll_no}}"
                           class="form-control"
                           disabled>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Upload Picture</label>
                    <input class="form-control" type="file" name="image"
                           value=""
                    >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please upload image.
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="validationCustom01">Member name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Enter name"
                           name="member_name" value="{{$memberDataByID->member_name}}"
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
                    <input type="number" class="form-control" id="validationCustom02"
                           value="{{$memberDataByID->member_phone}}" placeholder="Enter Phone Number"
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

                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label">Gender</label>

                        <select class="form-select mb-3" name="member_gender" required>
                            <option selected
                                    value="{{$memberDataByID->member_gender}}">{{$memberDataByID->member_gender}}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gender group.
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <label class="form-label">Blood group</label>

                        <select class="form-select mb-3" name="member_blood_group">
                            <option selected
                                    value="{{$memberDataByID->member_blood_group}}">{{$memberDataByID->member_blood_group}}</option>
                            <option value="">select</option>

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
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label">Trainer</label>

                        <select class="form-select mb-3" name="trainer">
                            <option value="">Select trainer</option>

                            @foreach($getEmployeeData as $getEmployeeDataVar)
                                @if ($memberDataByID->trainer != null)
                                    //  !$memberDataByID->trainer
                                    <option
                                        value="{{$getEmployeeDataVar->employee_name}}">{{$getEmployeeDataVar->employee_name}}</option>
                                @endif

                                <option
                                    value="{{$getEmployeeDataVar->employee_name}}">{{$getEmployeeDataVar->employee_name}}</option>

                                {{--                                <option value="A+">A+</option>--}}
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select trainer.
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Trainer fee</label>
                        <input type="text" class="form-control date"
                               name="trainer_fee" value="{{$memberDataByID->trainer_fee}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter trainer fee.
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Single Date Picker -->
                <div class="mb-3">
                    <label class="form-label">Joining Date</label>
                    <input type="text" class="form-control date"
                           name="member_joining_date" value="{{$memberDataByID->member_joining_date}}" readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select joining date.
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label">Gym Package</label>

                        <select class="form-select mb-3" name="member_package" required>
                            <option selected
                                    value="{{$memberDataByID->member_package}}">{{$memberDataByID->member_package}}</option>
                            @foreach($getPackageData as $getPackageDataVar)
                                <option
                                    value="{{$getPackageDataVar->salary_package_id}}">{{$getPackageDataVar->package_name}}</option>
                            @endforeach

                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gym Package.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Gym Shift</label>

                        <select class="form-select mb-3" name="member_shift" required>
                            <option selected
                                    value="{{$memberDataByID->member_shift}}">{{$memberDataByID->member_shift}}</option>
                            <option value="morning">Morning</option>
                            <option value="evening">Evening</option>
                            <option value="night">Night</option>


                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gym shift.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Single Date Picker -->
                <div class="mb-3">
                    <label class="form-label">Fee Start Date</label>
                    <input type="date" class="form-control"
                           id="member_fee_start_date" name="member_fee_start_date"
                           onchange="addEndDate()" value="{{$memberDataByID->member_fee_start_date}}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter fee start date.
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Fee End Date</label>
                    <input type="text" class="form-control"
                           name="member_fee_end_date" id="member_fee_end_date"
                           value="{{$memberDataByID->member_fee_end_date}}" readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter fee end date.
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">

                <div class="mb-3">
                    <label for="example-textarea" class="form-label">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Address"
                              name="member_address">{{$memberDataByID->member_address}}</textarea>
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
                              placeholder="Enter Pre-Existing Medical Condition">{{$memberDataByID->member_pemc}}</textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter Pre-Existing Medical Condition.
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update Member</button>
    </form>
    <script>

        function addEndDate() {
            // fee end date will be same to fee start date

            startDate = document.getElementById("member_fee_start_date").value;
            document.getElementById("member_fee_end_date").value = startDate;
        }


    </script>
@endsection
