@extends('layouts.backend-layout')


@section('title')
    Employee list
@endsection

@section('breadcrumb')
    Employee List

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
{{--                                    <th>Picture</th>--}}
{{--                                    <th>Emp Qr</th>--}}
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>Salary date</th>
                                    <th>Type</th>
                                    <th>Shift</th>
                                    <th>Package Amount</th>
                                    <th>action</th>
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

                                    <tr>
                                        <td>{{$employeeDataVar->employee_id}}</td>

{{--                                        <td>--}}
{{--                                            @if($employeeDataVar->image == null)--}}
{{--                                                --}}{{--      if there is no pic then default will display--}}

{{--                                                <img class="img-responsive  img-thumbnail"--}}
{{--                                                     style="height: 120px; width: 120px"--}}
{{--                                                     src="{{ asset('backend/images/black_employee_profile_picture.jpg') }}"--}}
{{--                                            @else--}}
{{--                                                --}}{{--        if getting pic from database--}}

{{--                                                <img class="img-responsive  img-thumbnail"--}}
{{--                                                     style="height: 120px; width: 120px"--}}
{{--                                                     src="{{asset('/backend/images/employee/profile/'.$employeeDataVar->image)}}">--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{!! QrCode::generate($employeeDataVar->id); !!}--}}
                                        </td>
                                        <td>{{$employeeDataVar->employee_name}}</td>
                                        <td>{{$employeeDataVar->employee_phone}}</td>
                                        <td>{{$employeeDataVar->employee_salary_end_date}}</td>
                                        <td>{{$employeeDataVar->employee_type}}</td>
                                        <td>{{$employeeDataVar->employee_shift}}</td>
                                        <td>
                                            {{--                                            getting data from package table to compare with member selected package--}}
                                            @foreach($packageData as $packageDataVar)

                                                @if($employeeDataVar->employee_package == $packageDataVar->salary_package_id)
                                                    {{$packageDataVar->package_amount}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><a href="{{route('editEmployee',['id'=>$employeeDataVar->employee_id])}}"
                                               class="action-icon"> <i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                        {{--                        <div class="tab-pane" id="alt-pagination-code">--}}
                        {{--                                                <pre class="mb-0">--}}
                        {{--                                                    <span class="html escape">--}}
                        {{--                                                        &lt;table id=&quot;alternative-page-datatable&quot; class=&quot;table dt-responsive nowrap w-100&quot;&gt;--}}
                        {{--                                                            &lt;thead&gt;--}}
                        {{--                                                                &lt;tr&gt;--}}
                        {{--                                                                    &lt;th&gt;Name&lt;/th&gt;--}}
                        {{--                                                                    &lt;th&gt;Position&lt;/th&gt;--}}
                        {{--                                                                    &lt;th&gt;Office&lt;/th&gt;--}}
                        {{--                                                                    &lt;th&gt;Age&lt;/th&gt;--}}
                        {{--                                                                    &lt;th&gt;Start date&lt;/th&gt;--}}
                        {{--                                                                    &lt;th&gt;Salary&lt;/th&gt;--}}
                        {{--                                                                &lt;/tr&gt;--}}
                        {{--                                                            &lt;/thead&gt;--}}

                        {{--                                                            &lt;tbody&gt;--}}
                        {{--                                                                &lt;tr&gt;--}}
                        {{--                                                                    &lt;td&gt;Tiger Nixon&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;System Architect&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;Edinburgh&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;61&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;2011/04/25&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;$320,800&lt;/td&gt;--}}
                        {{--                                                                &lt;/tr&gt;--}}
                        {{--                                                                &lt;tr&gt;--}}
                        {{--                                                                    &lt;td&gt;Garrett Winters&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;Accountant&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;Tokyo&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;63&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;2011/07/25&lt;/td&gt;--}}
                        {{--                                                                    &lt;td&gt;$170,750&lt;/td&gt;--}}
                        {{--                                                                &lt;/tr&gt;--}}
                        {{--                                                            &lt;/tbody&gt;--}}
                        {{--                                                        &lt;/table&gt;--}}
                        {{--                                                    </span>--}}
                        {{--                                                </pre> <!-- end highlight-->--}}
                        {{--                        </div> <!-- end preview code-->--}}
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <!-- end row-->

@endsection
