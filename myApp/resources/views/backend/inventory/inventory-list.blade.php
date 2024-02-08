@extends('layouts.backend-layout')


@section('title')
    Inventory list
@endsection

@section('breadcrumb')
    Inventory List

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
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Amount</th>
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

                                @foreach($inventoryData as $inventoryDataVar)

                                    <tr>

                                        <td>{{$inventoryDataVar->inventory_title}}</td>
                                        <td>{{$inventoryDataVar->inventory_quantity}}</td>
                                        <td>{{$inventoryDataVar->inventory_unit_price}}</td>
                                        <td>{{$inventoryDataVar->inventory_description}}</td>
                                        <td>{{$inventoryDataVar->inventory_amount}}</td>
                                        <td><a href="{{route('editInventory',['id'=>$inventoryDataVar->inventory_id])}}"
                                               class="action-icon"> <i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                        <!-- end preview code-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <!-- end row-->


@endsection
