<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\FeeCollection;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Total members
        $totalMembers = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->count();

        // Active members percentage
        // agar memebr ki fee date current date mein -10 days added karne k bad bhi nahi fullfill kare ge to inactive consider hoga
        $cDate = now()->addDay(-10);
        $fee = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('member_fee_end_date', '>', $cDate)->get()->count();
        if ($fee != null) {
            $percent = round($fee / $totalMembers * 100);
        } else {
            $percent = 0;
        }

        // Total employees
        $totalEmployees = Employee::where('belong_to_gym', Auth::user()->belong_to_gym)->count();

        // Active employee percentage
        $cDate = now()->addDay(-10);
        $employeeSalary = Employee::where('belong_to_gym', Auth::user()->belong_to_gym)->where('employee_salary_end_date', '>', $cDate)->get()->count();
        if ($employeeSalary != null) {
            $employeePercent = round($employeeSalary / $totalEmployees * 100);
        } else {
            $employeePercent = 0;
        }

        // Monthly Expense
        $currentDate = now();
        $monthlyExpense = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)
            ->whereMonth('created_at', $currentDate->month)
            ->whereYear('created_at', $currentDate->year)
            ->sum('expense_amount');

        // Daily Expense
        $dailyExpense = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)
            ->whereDay('created_at', $currentDate->day)
            ->whereMonth('created_at', $currentDate->month)
            ->whereYear('created_at', $currentDate->year)
            ->sum('expense_amount');

        if ($monthlyExpense != null) {
            $expenseDailyPercent = round($dailyExpense / $monthlyExpense * 100);
        } else {
            $expenseDailyPercent = 0;
        }

        // Monthly Income
        $monthlyIncome = FeeCollection::where('belong_to_gym', Auth::user()->belong_to_gym)
            ->whereMonth('created_at', $currentDate->month)
            ->whereYear('created_at', $currentDate->year)
            ->sum('amount_received');

        $dailyIncome = FeeCollection::where('belong_to_gym', Auth::user()->belong_to_gym)
            ->whereDay('created_at', $currentDate->day)
            ->whereMonth('created_at', $currentDate->month)
            ->whereYear('created_at', $currentDate->year)
            ->sum('amount_received');

        if ($monthlyIncome != null) {
            $incomeDailyPercent = round($dailyIncome / $monthlyIncome * 100);
        } else {
            $incomeDailyPercent = 0;
        }

        // Return the view with the compacted data
        return view('backend.dashboard.dashboard', compact('totalMembers', 'fee', 'percent', 'totalEmployees', 'employeeSalary', 'employeePercent', 'monthlyExpense', 'dailyExpense', 'expenseDailyPercent', 'monthlyIncome', 'dailyIncome', 'incomeDailyPercent'));
    }

    public function sendSms(Request $request)
    {
        $all = $request->all();

        $api_key = "923092018911-e1179358-7e5e-475b-b2b0-4836839db84e";///YOUR API KEY
        $mobile = '923092018911';///Recepient Mobile Number
        $sender = "Something";
        $message = "new message";

////sending sms

        $post = "sender=" . urlencode($sender) . "&mobile=" . urlencode($mobile) . "&message=" . urlencode($message) . "";
        $url = "https://sendpk.com/api/sms.php?api_key=$api_key";
        $ch = curl_init();
        $timeout = 0; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        /*Print Responce*/
        echo $result;


    }
}
