<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymMemberAttendance" aria-expanded="false"
       aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>Member  Attendance  </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymMemberAttendance">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addAttendance')}}">Mark Attendance</a>
            </li>

        </ul>
    </div>
</li>



<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#employeeAttendance" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>  Employee Attendance </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="employeeAttendance">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addEmployeeAttendance')}}">Mark Employee Attendance</a>
            </li>

        </ul>
    </div>
</li>
