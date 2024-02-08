@extends('layouts.backend-layout')

@section('title')
    Edit Employee
@endsection

@section('breadcrumb')
    Edit Employee
@endsection

@section('content')

    <form method="post" action="{{route('updateEmployee',['id'=>$employeeDataByID->employee_id])}}" enctype="multipart/form-data"
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
                    <label class="form-label">Employee ID</label>
                    <input type="text" style="color: #526be2 !important;" value="{{$employeeDataByID->employee_id}}"
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
                    <label class="form-label" for="validationCustom01">Employee name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Enter name"
                           name="employee_name" value="{{$employeeDataByID->employee_name}}"
                           required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter employee name.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="validationCustom02">Phone Number</label>
                    <input type="number" class="form-control" id="validationCustom02"
                           value="{{$employeeDataByID->employee_phone}}" placeholder="Enter Phone Number"
                           name="employee_phone" required>
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

                        <select class="form-select mb-3" name="employee_gender" required>
                            <option selected
                                    value="{{$employeeDataByID->employee_gender}}">{{$employeeDataByID->employee_gender}}</option>
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
                        <label class="form-label">Type</label>

                        <select class="form-select mb-3" name="employee_type" required>
                            <option selected
                                    value="{{$employeeDataByID->employee_type}}">{{$employeeDataByID->employee_type}}</option>
                            <option value="trainer">Trainer</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="cleaner">Cleaner</option>
                            <option value="other">Other</option>

                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select employee type.
                        </div>


                    </div>


                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label">Blood group</label>

                        <select class="form-select mb-3" name="employee_blood_group" required>
                            <option selected
                                    value="{{$employeeDataByID->employee_blood_group}}">{{$employeeDataByID->employee_blood_group}}</option>
                            <option value="unknown">Unknown</option>
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
                    <div class="col-lg-6">
                        <label class="form-label">Gym Shift</label>

                        <select class="form-select mb-3" name="employee_shift" required>
                            <option selected
                                    value="{{$employeeDataByID->employee_shift}}">{{$employeeDataByID->employee_shift}}</option>
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
                    <label class="form-label">Joining Date</label>
                    <input type="text" class="form-control date"
                           name="employee_joining_date" value="{{$employeeDataByID->employee_joining_date}}" readonly>
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
                    <label class="form-label">Gym Package</label>

                        <select class="form-select mb-3" name="employee_package" required>
                                <option selected
                                        value="{{$employeeDataByID->employee_package}}">{{$employeeDataByID->employee_package}}</option>
                                @foreach($getPackageData as $getPackageDataVar)
                               <option value="{{$getPackageDataVar->salary_package_id}}">{{$getPackageDataVar->package_name}}</option>

                                @endforeach

                        </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select gym Package.
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
                           id="employee_salary_start_date"
                           name="employee_salary_start_date"
                           onchange="addEndDate()" value="{{$employeeDataByID->employee_salary_start_date}}">
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
                    <input type="date" value="{{$employeeDataByID->employee_salary_end_date}}" class="form-control"
                           name="employee_salary_end_date" id="employee_salary_end_date"
                           readonly>
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
                              name="employee_address">{{$employeeDataByID->employee_address}}</textarea>
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
                    <textarea class="form-control" id="example-textarea" rows="3" name="employee_pemc"
                              placeholder="Enter Pre-Existing Medical Condition">{{$employeeDataByID->employee_pemc}}</textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter Pre-Existing Medical Condition.
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update employee</button>
    </form>
    <script>

        function addEndDate() {
            // fee end date will be same to fee start date

            startDate = document.getElementById("employee_salary_start_date").value;
            document.getElementById("employee_salary_end_date").value = startDate;
        }

    </script>
@endsection
