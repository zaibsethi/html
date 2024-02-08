@extends('layouts.backend-layout')


@section('title')

    Dashboard
@endsection
@section('breadcrumb')

    Dashboard
@endsection


@section('content')

    {{--    <form method="post" action="{{route('sendSms')}}" enctype="multipart/form-data">--}}
    {{--        @csrf--}}
    {{--        <input name="number" type="number" required>--}}
    {{--        <input name="message" type="text" required>--}}
    {{--        <button type="submit" class="btn btn-primary">Send</button>--}}
    {{--    </form>--}}

    @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')
        {{-- Auto refresh laravel page--}}
        {{ header("refresh: 100")}}


        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Campaign Sent">Total <br> Members</h5>
                                <h3 class="my-2 py-1">{{$totalMembers}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> 100%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Campaign Sent">Active <br> Members</h5>
                                <h3 class="my-2 py-1">{{$fee}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> {{$percent}}%</span>
                                </p>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="New Leads">Total <br> Employees</h5>
                                <h3 class="my-2 py-1">{{$totalEmployees}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2">100%</span>
                                </p>
                            </div>

                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="New Leads">Active <br> Employees</h5>
                                <h3 class="my-2 py-1">{{$employeeSalary}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2">{{$employeePercent}}%</span>
                                </p>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Deals">Monthly <br> Expense</h5>
                                <h3 class="my-2 py-1">{{$monthlyExpense}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> 100%</span>
                                </p>
                            </div>
                            <div class="col-6">

                                <h5 class="text-muted fw-normal mt-0 " title="Deals">Daily <br>Expense</h5>
                                <h3 class="my-2 py-1">{{$dailyExpense}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> {{$expenseDailyPercent}}%</span>
                                </p>

                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Booked Revenue">Monthly <br>
                                    Income </h5>
                                <h3 class="my-2 py-1">{{$monthlyIncome}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> 100%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Booked Revenue">Daily <br>
                                    Income </h5>
                                <h3 class="my-2 py-1">{{$dailyIncome}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"> {{$incomeDailyPercent}}%</span>
                                </p>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>

        <hr>
    @else
        {{"Dashboard"}}
    @endif

@endsection
