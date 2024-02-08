@extends('layouts.backend-layout')


@section('title')
    User list
@endsection

@section('breadcrumb')
    User List

@endsection

@section('content')

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
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="alt-pagination-preview">
                            <table id="alternative-page-datatable"
                                   class="table table-striped dt-responsive nowrap w-100">

                                <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
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

                                @foreach($usersData as $usersDataVar)

                                    <tr>
                                        <td>{{$usersDataVar->name}}</td>

                                        <td>{{ $usersDataVar->email}}</td>
                                        <td>{{$usersDataVar->type}}</td>

                                        <td><a href="{{route('editUser',['id'=>$usersDataVar->id])}}"
                                               class="action-icon"> <i class="mdi mdi-pencil"></i></a></td>

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
