@extends('layouts.backend-layout')


@section('title')
    Members list
@endsection

@section('breadcrumb')
    Members List

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{--            @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")--}}
            {{--                <a class="btn btn-success" href="{{route('memberExport')}}">Export Members</a>--}}
            {{--            @endif--}}

            {{--            <form action="{{ route('memberImport') }}" method="post" enctype="multipart/form-data">--}}
            {{--                @csrf--}}
            {{--                <input type="file" name="excel_file">--}}
            {{--                <button type="submit">Import</button>--}}
            {{--            </form>--}}
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
                                    <th>Phone</th>
                                    <th>Fee date</th>
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

                                @foreach($memberData as $memberDataVar)

                                    <tr>
                                        <td>{{$memberDataVar->roll_no}}</td>
                                        <td>{{$memberDataVar->member_name}}</td>
                                        <td>{{$memberDataVar->member_phone}}</td>
                                        <td>{{$memberDataVar->member_fee_end_date}}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")
                                                <a href="{{route('editMember',['id'=>$memberDataVar->roll_no])}}"
                                                   class="action-icon" target="_blank"> <i
                                                        class="mdi mdi-pencil"></i></a></td>
                                        @endif
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
