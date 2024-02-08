@extends('layouts.backend-layout')


@section('title')
    Personal Training Members list
@endsection

@section('breadcrumb')
    Personal Training Members List

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
                                    <th>Fee date</th>
                                    <th>Package Amount</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($personalTraining as $personalTrainingVar)

                                    <tr>
                                        <td>{{$personalTrainingVar->id}}</td>

                                        <td>{{$personalTrainingVar->member_name}}</td>
                                        <td>{{$personalTrainingVar->member_fee_end_date}}</td>

                                        <td>
                                            {{-- getting data from package table to compare with member selected package--}}
                                            @foreach($packageData as $packageDataVar)

                                                @if($personalTrainingVar->member_package == $packageDataVar->package_amount)
                                                    {{$packageDataVar->package_amount}}
                                                @endif
                                            @endforeach

                                            <br><br>

                                            @if($personalTrainingVar->trainer != null)
                                                {{-- getting data from employee table to for personal training check --}}
                                                {{"Personal training fee: ".$personalTrainingVar->trainer_fee}}
                                                {{--                                                <br>--}}
                                                {{--                                                <span style="color: red">{{$personalTrainingVar->trainer}}</span>--}}
                                                {{--                                                <br>--}}
                                                {{--                                                <span>  {{$personalTrainingVar->trainer_fee}}</span>--}}

                                            @endif
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
