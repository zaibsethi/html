<li class="side-nav-title side-nav-item">Gym Inventory</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymInventory" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>  Inventory </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymInventory">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addInventory')}}">Create Inventory</a>
                <a href="{{route('inventoryList')}}">Inventory List</a>
            </li>

        </ul>
    </div>
</li>

<li class="side-nav-title side-nav-item">Gym Package</li>


<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymPackage" aria-expanded="false" aria-controls="gymPackage"
       class="side-nav-link">
        <i class="uil-money-bill-stack"></i>
        <span> Fee  Package </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymPackage">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addPackage')}}">Create Package</a>
            </li>
            <li><a href="{{route('packagesList')}}">Packages List</a>
            </li>

        </ul>
    </div>
</li>

<li class="side-nav-title side-nav-item">Reports</li>


<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="gymPackage"
       class="side-nav-link">
        <i class="uil-receipt"></i>
        <span>  Reports </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="reports">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('reports')}}">Reports List</a>
            </li>


        </ul>
    </div>
</li>


<li class="side-nav-title side-nav-item">Gym Employee</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymEmployee" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>  Employees </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymEmployee">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addEmployee')}}">Create Employee</a>
                <a href="{{route('employeeList')}}">Employee List</a>
            </li>

        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#employeeSalary" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>  Employee Salary </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="employeeSalary">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addSalary')}}">Pay Employee Salary</a>
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

<li class="side-nav-title side-nav-item">Employee Package</li>


<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#employeePackage" aria-expanded="false" aria-controls="gymPackage"
       class="side-nav-link">
        <i class="uil-money-bill-stack"></i>
        <span> Salary Package </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="employeePackage">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addEmployeePackage')}}">Create Employee Package</a>
            </li>
            <li>
                <a href="{{route('employeePackagesList')}}"> Employee Packages List</a>
            </li>


        </ul>
    </div>
</li>


{{--            <li class="side-nav-title side-nav-item">Member Things</li>--}}
{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#memberThings" aria-expanded="false" aria-controls="gymMembers"--}}
{{--                   class="side-nav-link">--}}
{{--                    <i class="uil-clipboard-alt"></i>--}}
{{--                    <span>  Manage Things </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="memberThings">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('addMemberThing')}}">Add Thing</a>--}}
{{--                            <a href="{{route('thingsList')}}">Things List</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--                        <li class="side-nav-title side-nav-item">Manage Task</li>--}}
{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#task" aria-expanded="false" aria-controls="gymMembers"--}}
{{--                               class="side-nav-link">--}}
{{--                                <i class="uil-clipboard-alt"></i>--}}
{{--                                <span>  Manage Task </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="task">--}}
{{--                                <ul class="side-nav-second-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('addTask')}}">Add Task</a>--}}
{{--                                        <a href="{{route('taskList')}}">Task List</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--<li class="side-nav-title side-nav-item">Manage Message</li>--}}
{{--<li class="side-nav-item">--}}
{{--    <a data-bs-toggle="collapse" href="#message" aria-expanded="false" aria-controls="message"--}}
{{--       class="side-nav-link">--}}
{{--        <i class="uil-clipboard-alt"></i>--}}
{{--        <span>  Manage Message </span>--}}
{{--        <span class="menu-arrow"></span>--}}
{{--    </a>--}}
{{--    <div class="collapse" id="message">--}}
{{--        <ul class="side-nav-second-level">--}}
{{--            <li>--}}
{{--                <a href="{{route('addMessage')}}">Send Message</a>--}}
{{--                <a href="{{route('messageList')}}">Message List</a>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </div>--}}
{{--</li>--}}

<li class="side-nav-title side-nav-item">Manage User</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user"
       class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span>  Manage User </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="user">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addUser')}}">Add User</a>
                <a href="{{route('userList')}}">Users List</a>
            </li>

        </ul>
    </div>
</li>
