<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\EmployeePackage;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{

    public function addSalary()
    {
        {
//        employee and employee-package get send from db for salary
            $employeeData = Employee::where('belong_to_gym', Auth::user()->belong_to_gym)->cursor();
            $packageData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
            $employeeAttendance = EmployeeAttendance::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
            return view('backend.salary.employee-salary', compact('employeeData', 'packageData', 'employeeAttendance'));

        }

    }

    public function createSalary(Employee $id, Request $request)
    {

        $salaryData = $request->all();
//        add 30 days to salary_end_date
        $addDaysSalary = Carbon::parse($request->employee_salary_end_date)->addMonth(1)->format('Y-m-d');
        $id->update(['employee_salary_end_date' => $addDaysSalary]);;
        $salaryData['belong_to_gym'] = Auth::user()->belong_to_gym;
        Salary::create($salaryData);
        return redirect(route('addSalary'))->with('success', 'Salary paid successfully.');
    }

    public function salaryHistory(Salary $id, Request $request)
    {

      //get id from request and send specific employee salary history
        $salaryHistoryData = Salary::where('belong_to_gym', Auth::user()->belong_to_gym)->where('employee_id', $request->employee_id)->get();
        return view('backend.salary.salary-history-list', compact('salaryHistoryData'));
    }
}
