<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymMembers" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-user"></i>
        <span> Members </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymMembers">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addMember')}}">Create Member</a>
                <a href="{{route('memberList')}}">Members List</a>
            </li>

        </ul>
    </div>
</li>
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
    <a data-bs-toggle="collapse" href="#gymMemberFee" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class="uil-atm-card"></i>
        <span>Member  Fee  </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymMemberFee">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addFee')}}">Collect Member Fee</a>

            </li>

        </ul>
    </div>
</li>

<li class="side-nav-title side-nav-item">Gym Expenses</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#gymExpense" aria-expanded="false" aria-controls="gymMembers"
       class="side-nav-link">
        <i class=" uil-calculator-alt"></i>
        <span>  Expenses </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="gymExpense">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{route('addExpense')}}">Create Expense</a>
                <a href="{{route('expenseList')}}">Expenses List</a>
            </li>

        </ul>
    </div>
</li>
