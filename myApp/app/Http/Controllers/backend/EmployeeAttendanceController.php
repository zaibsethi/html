<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\EmployeePackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAttendanceController extends Controller
{
    public function addEmployeeAttendance()
    {
        // get employee and package data from database according to belongsTo gym
        $employeeData = Employee::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        $packageData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->get();

        return view('backend.employee-attendance.add-attendance', compact('employeeData', 'packageData'));

    }

    public function createEmployeeAttendance(Request $request)
    {
//        for already marked attendance
        $allAttendanceData = EmployeeAttendance::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        $cdate = Carbon::now()->format('Y-m-d');

        foreach ($allAttendanceData as $allAttendanceDataVar) {
//          get created_at from db and convert the format date only and compare
            $createdAtFromDb = Carbon::parse($allAttendanceDataVar->created_at)->format('Y-m-d');
            if ($createdAtFromDb == $cdate && $allAttendanceDataVar->employee_name == $request->employee_name) {
                return redirect()->route('addEmployeeAttendance')->with('success', 'Attendance Already Marked.');

            }

        }


        $getEmployeeAttendanceData = $request->all();
        //custom value for comparing while update check out
        $getEmployeeAttendanceData['updated_at'] = "2022-07-01";
        $getEmployeeAttendanceData['belong_to_gym'] = Auth::user()->belong_to_gym;
        EmployeeAttendance::create($getEmployeeAttendanceData);

        if (($cdate) < ($request->employee_salary_end_date)) {
            return redirect(route('addEmployeeAttendance'))->with('success', 'Attendance Marked. salary Paid.');

        } else
            return redirect(route('addEmployeeAttendance'))->with('danger', 'Attendance Marked. Please Pay salary.');


    }

    public function singleEmployeeAttendanceList(Request $request)
    {
        //get id from request and send specific employee Attendance list
        $currentDate = now();

        $employeeData = EmployeeAttendance::where('belong_to_gym', Auth::user()->belong_to_gym)->where('employee_id', $request->employee_id)->whereMonth('created_at', $currentDate->month)->whereYear('created_at', $currentDate->year)->get();

        return view('backend.employee-attendance.single-employee-attendance-list', compact('employeeData',));
    }


    public function updateEmployeeAttendance(Request $request)
    {
        $cdate = Carbon::now()->format('Y-m-d');
        $cdateAndTime = Carbon::now();

        $compareEmployeeData = EmployeeAttendance::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        foreach ($compareEmployeeData as $compareEmployeeVar) {
//            $checkNewDate = ($compareEmployeeVar->created_at)->format('d.m.Y');
            if ($compareEmployeeVar->created_at->format('Y-m-d') == $cdate && $compareEmployeeVar->employee_name == $request->employee_name) {
                if ($compareEmployeeVar->updated_at == "2022-07-01 00:00:00") {
                    EmployeeAttendance::where('belong_to_gym', Auth::user()->belong_to_gym)->where('employee_name', $request->employee_name)->update(['updated_at' => $cdateAndTime]);

                    return redirect()->route('addEmployeeAttendance')->with('success', 'Check Out Marked.');

                } else {
                    return redirect()->route('addEmployeeAttendance')->with('danger', 'Check Out Already Marked.');

                }

            }

        }

        return redirect()->route('addEmployeeAttendance')->with('danger', 'Check In first.');

    }
}
