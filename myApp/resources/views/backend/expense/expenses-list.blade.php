@extends('layouts.backend-layout')


@section('title')
    Expenses list
@endsection

@section('breadcrumb')
    Expenses List

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
                                    <th>Expense ID</th>
                                    <th>Expense Title</th>
                                    <th>Expense Amount</th>
                                    <th>Expense Description</th>
                                    <th>Expense Date</th>
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

                                @foreach($expenseData as $expenseDataVar)
                                    <tr>
                                        <td class="table-user">
                                            {{$expenseDataVar->expense_id}}
                                        </td>
                                        <td>
                                            {{$expenseDataVar->expense_title}}
                                        </td>
                                        <td>                {{$expenseDataVar->expense_amount}}
                                        </td>
                                        <td>                {{$expenseDataVar->expense_description}}
                                        </td>
                                        <td>                {{$expenseDataVar->created_at}}
                                        </td>

                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->type == "owner")

                                                <a href="{{route('editExpense',['id'=>$expenseDataVar->expense_id])}}"
                                                   class="action-icon"> <i
                                                        class="mdi mdi-pencil"></i></a>
                                            @endif
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
