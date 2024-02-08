<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExpenseRequest;
use App\Jobs\SendMessage;
use App\Models\Expense;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function addExpense()
    {

        return view('backend.expense.add-expense');
    }

    public function createExpense(CreateExpenseRequest $request)
    {
        $getExpenseData = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)->where('expense_id', '<>', null)->count();
        $storeExpenseData = $request->all();
        $storeExpenseData['belong_to_gym'] = Auth::user()->belong_to_gym;
        $storeExpenseData['expense_id'] = $getExpenseData + 1;

        Expense::create($storeExpenseData);

        return redirect(route('addExpense'))->with('success', 'Expense added successfully.');
    }


    public function expenseList()
    {
        $expenseData = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        return view('backend.expense.expenses-list', compact('expenseData'));
    }

    public function editExpense($id)
    {
        $expenseData = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)->where('expense_id', $id)->first();
        return view('backend.expense.edit-expense', compact('expenseData'));

    }

    public function updateExpense(CreateExpenseRequest $request,  $id)
    {

        $expenseData = Expense::where('belong_to_gym', Auth::user()->belong_to_gym)->where('expense_id', $id)->first();

        $getExpenseData = $request->all();

        $expenseData->update($getExpenseData);
        return redirect(route('expenseList'))->with('success', 'Expense updated successfully.');

    }
}
