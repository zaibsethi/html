@extends('layouts.backend-layout')


@section('title')
    Fee History list
@endsection

@section('breadcrumb')
    Fee History List

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
                                    <th>package Amount</th>
                                    <th>Amount Received</th>
                                    <th>Fee Date</th>
                                    <th>Received Date</th>

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

                                @foreach($feeHistoryData as $feeHistoryDataVar)
                                    <tr>

                                        <td>
                                            {{$feeHistoryDataVar->member_id}}
                                        </td>
                                        <td>                {{$feeHistoryDataVar->member_name}}
                                        </td>

                                        <td>                {{$feeHistoryDataVar->package_amount}}
                                        </td>
                                        <td>                {{$feeHistoryDataVar->amount_received}}
                                        </td>
                                        <td>

                                            {{$feeHistoryDataVar->member_fee_end_date}}
                                        </td>
                                        <td>
                                            {{--                                            get created_at with time and convert into only date--}}

                                            <input value="{{$receivedDate =$feeHistoryDataVar->created_at}}  hidden>
                                            <input value="{{$receivedVar =  Carbon\Carbon::parse($receivedDate)->format('Y-m-d')}}
                                            "
                                            hidden>
                                            {{$receivedVar}}</td>

                                    </tr>
                                @endforeach                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                        <!-- end preview code-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
