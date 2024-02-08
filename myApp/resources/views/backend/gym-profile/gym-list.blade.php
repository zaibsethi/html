@extends('layouts.backend-layout')


@section('title')
    gyms list
@endsection

@section('breadcrumb')
    gyms List

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
                                    <th>Gym Logo</th>
                                    <th>Gym ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Package</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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

                                @foreach($gymData as $gymDataVar)

                                    <tr>
                                        <td>
                                            @if($gymDataVar->gym_logo == null)
                                                {{-- if there is no pic then default will display--}}

                                                <img class="img-responsive  img-thumbnail"
                                                     style="height: 120px; width: 120px"
                                                     src="{{ asset('backend/images/black_member_profile_picture.jpg') }}"
                                            @else
                                                {{--   if getting pic from database--}}

                                                <img class="img-responsive  img-thumbnail"
                                                     style="height: 120px; width: 120px"
                                                     src="{{asset('/backend/images/gym/profile/'.$gymDataVar->gym_logo)}}">
                                            @endif
                                        </td>
                                        <td>{{$gymDataVar->gym_id}}</td>

                                        <td>{{$gymDataVar->gym_name}}</td>
                                        <td>{{$gymDataVar->phone}}</td>
                                        <td>{{$gymDataVar->gym_package}}</td>
                                        <td>{{$gymDataVar->gym_package_start_date}}</td>
                                        <td>{{$gymDataVar->gym_package_end_date}}</td>


                                        @if(\Illuminate\Support\Facades\Auth::user()->type == "developer")
                                            <td>
                                                                                                <a href="{{route('editGym',['id'=>$gymDataVar->gym_id])}}"
                                                                                                   class="action-icon"> <i class="mdi mdi-pencil"></i></a>

                                            </td>
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
