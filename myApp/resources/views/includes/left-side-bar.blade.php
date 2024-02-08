<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            @if(\Illuminate\Support\Facades\Auth::user()->image == null)
                {{--      if there is no pic then default will display--}}

                <img alt="user-image" height="42"
                     class="rounded-circle shadow-sm"
                     src="{{ asset('backend/images/black_member_profile_picture.jpg') }}">
            @else
                <img alt="user-image" height="42"
                     class="rounded-circle"
                     src="{{ asset('/backend/images/user/profile/'.Illuminate\Support\Facades\Auth::user()->image) }}">
            @endif
            <span class="leftbar-user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a href="{{route('dashboard')}}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Dashboard </span>
            </a>
        </li>


        <li class="side-nav-title side-nav-item">Gym Member</li>
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'admin')
            @include('includes.roles.admin')

        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'trainer')
            @include('includes.roles.trainer')
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner' || \Illuminate\Support\Facades\Auth::user()->type == 'superAdmin')
            @include('includes.roles.ownerOrSuperAdmin')
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'owner')
            @include('includes.roles.owner')
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->type == 'developer')

            @include('includes.roles.developer')
        @endif
        {{--        @endif--}}

        {{--   Pages  Access  Only to Owner --}}


    </ul>

    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
