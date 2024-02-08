<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img class="img-responsive" src="{{asset('assets/images/logo-light.png')}}" alt=""
                             style="height: 50px;">
                    </span>
            <span class="topnav-logo-sm">
                        <img class="img-responsive" src="{{asset('assets/images/logo_sm.png')}}" alt=""
                             style="height: 50px;">
                    </span>
        </a>


        <ul class="list-unstyled topbar-menu float-end mb-0">
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            {{--            <a class="button-menu-mobile ">--}}
            {{--                <div class="lines">--}}
            {{--                    <span></span>--}}
            {{--                    <span></span>--}}
            {{--                    <span></span>--}}
            {{--                </div>--}}
            {{--            </a>--}}
            <div class="app-search dropdown">
            </div>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                   id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                            <span class="account-user-avatar">

                                  @if(\Illuminate\Support\Facades\Auth::user()->image == null)
                                    {{--      if there is no pic then default will display--}}


                                    <img alt="user-image" height="42"
                                         class="rounded-circle"
                                         src="{{ asset('backend/images/black_member_profile_picture.jpg') }}">


                                @else
                                    <img alt="user-image" height="42"
                                         class="rounded-circle"
                                         src="{{ asset('/backend/images/user/profile/'.Illuminate\Support\Facades\Auth::user()->image) }}">
                                @endif
                            </span>
                    <span>
                                <span
                                    class="account-user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                <span class="account-position">{{\Illuminate\Support\Facades\Auth::user()->type}}</span>
                            </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                {{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                {{--                        <i class="mdi mdi-account-circle me-1"></i>--}}
                {{--                        <span>Profile</span>--}}
                {{--                    </a>--}}


                <!-- item-->

                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span> </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>
            <li class="notification-list">
                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>
        </ul>

    </div>
</div>
