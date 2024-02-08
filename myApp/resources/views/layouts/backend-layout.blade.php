<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/fixedHeader.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/fixedColumns.bootstrap5.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->
    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

    <style>
        /*  my custom css   */

        /*strat  hide number  field arrow*/
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /*end  hide number  field arrow*/

        /* start:button style reports page*/
        .btn-huge {
            padding-top: 20px;
            margin-top: 10px;
            padding-bottom: 20px;
        }


        /* end: button style reports page*/
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'admin' || \Illuminate\Support\Facades\Auth::user()->type == 'superAdmin')

        .dataTables_info {
            visibility: hidden;
        }
        @endif
        @yield('styles')
    </style>

</head>

<body class="loading" data-layout-color="dark" data-layout="detached" data-rightbar-onstart="true">

<!-- Topbar Start -->
@include('includes.top-bar')
<!-- end Topbar -->

<!-- Start Content-->
<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('includes.left-side-bar')
        <!-- Left Sidebar End -->

        <!-- Begin Content -->

        <div class="content-page">
            <div class="content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title">@yield('breadcrumb')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @yield('content')
            </div>


            <!-- End Content -->
            <br><br>
            <!-- Footer Start -->
            @include('includes.footer')
            <!-- end Footer -->

        </div>
        <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- END Container -->


<!-- Right Sidebar -->
@include('includes.right-side-bar')
<!-- /End-bar -->


<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- third party js -->
<script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- third party js ends -->


<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>
<!-- end demo js-->

<!-- third party js -->
<script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/fixedColumns.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/fixedHeader.bootstrap5.min.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.datatable-init.js')}}"></script>
<!-- end demo js-->


<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.form-wizard.js')}}"></script>
<!-- end demo js-->

<!-- Todo js -->
<script src="{{asset('assets/js/ui/component.todo.js')}}"></script>
<script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>

</body>

</html>
