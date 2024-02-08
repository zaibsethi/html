@extends('layouts.backend-layout')


@section('title')
    Packages list
@endsection

@section('breadcrumb')
    Packages List

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
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Package Amount</th>
                                    <th>Package Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packageData as $packageDataVar)
                                    <tr>
                                        <td class="table-user">
                                            {{$packageDataVar->package_id}}
                                        </td>
                                        <td class="table-user">
                                            {{$packageDataVar->package_name}}
                                        </td>
                                        <td>                {{$packageDataVar->package_amount}}
                                        </td>
                                        <td>                {{$packageDataVar->package_description}}
                                        </td>
                                        <td class="table-action">
                                            <a href="{{route('editPackage',['id'=>$packageDataVar->package_id])}}"
                                               class="action-icon"> <i
                                                    class="mdi mdi-pencil"></i></a>
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



@endsection
