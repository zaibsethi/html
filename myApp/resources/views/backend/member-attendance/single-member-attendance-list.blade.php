@extends('layouts.backend-layout')


@section('title')
    Member Attendance list
@endsection

@section('breadcrumb')
    Member Attendance list

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
                                    <th>phone</th>
                                    <th>fee date</th>
                                    <th>Attendance Date</th>
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

                                    <tr>
                                        <td>{{$memberDataVar->member_id}}</td>


                                        <td>{{$memberDataVar->member_name}}</td>
                                        <td>{{$memberDataVar->member_phone}}</td>
                                        <td>{{$memberDataVar->member_fee_end_date}}</td>

                                        <td>{{$memberDataVar->created_at}}</td>
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
