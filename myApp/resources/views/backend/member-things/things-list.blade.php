@extends('layouts.backend-layout')


@section('title')
    Things list
@endsection

@section('breadcrumb')
    Things List

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
                                    <th>ID</th>
                                    <th>Member name</th>
                                    <th>Member phone</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
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

                                @foreach($thingsData as $thingsDataVar)
                                    <tr>
                                        <td class="table-user">
                                            {{$thingsDataVar->id}}
                                        </td>
                                        <td>
                                            {{$thingsDataVar->member_name}}
                                        </td>
                                        <td>                {{$thingsDataVar->member_phone}}
                                        </td>
                                        <td>                {{$thingsDataVar->member_thing_description}}
                                        </td>
                                        <td>                {{$thingsDataVar->member_thing_category}}
                                        </td>
                                        <td>
                                            <a href="{{route('deleteThing',['id'=>$thingsDataVar->id])}}">
                                            <button class="btn btn-info">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>






@endsection
