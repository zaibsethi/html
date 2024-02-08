<?php

use App\Http\Controllers\backend\TaskController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PackageController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MemberController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\InventoryController;
use App\Http\Controllers\backend\FeeCollectionController;
use App\Http\Controllers\backend\MemberAttendanceController;
use App\Http\Controllers\backend\ReportsController;
use App\Http\Controllers\backend\EmployeePackageController;
use App\Http\Controllers\backend\SalaryController;
use App\Http\Controllers\backend\EmployeeAttendanceController;
use App\Http\Controllers\backend\MemberThingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Begin: MemberController
    Route::get('add-member', [MemberController::class, 'addMember'])->name('addMember')->middleware('isOwner');
    Route::post('create-member', [MemberController::class, 'createMember'])->name('createMember')->middleware('isOwner');
    Route::get('members-list', [MemberController::class, 'memberList'])->name('memberList')->middleware('isOwner');
    Route::get('edit-member/{id}', [MemberController::class, 'editMember'])->name('editMember')->middleware('isOwner');
    Route::post('update-member/{id}', [MemberController::class, 'updateMember'])->name('updateMember')->middleware('isSuperAdminOrOwner');
    Route::post('update-member-date', [MemberController::class, 'updateMemberDate'])->name('updateMemberDate')->middleware('isSuperAdminOrOwner');
    Route::get('export-members', [MemberController::class, 'memberExport'])->name('memberExport')->middleware('isOwner');
    Route::post('import-members', [MemberController::class, 'memberImport'])->name('memberImport')->middleware('isOwner');
// end: MemberController


    // Begin :  FeeCollectionController
    Route::group(['FeeCollectionController'], function () {

        Route::get('add-fee', [FeeCollectionController::class, 'addFee'])->name('addFee')->middleware('isSuperAdminOrOwner');
        Route::post('create-fee/{id}', [FeeCollectionController::class, 'createFee'])->name('createFee')->middleware('isSuperAdminOrOwner');
        Route::post('fee-history', [FeeCollectionController::class, 'feeHistory'])->name('feeHistory')->middleware('isOwner');
    });
// end   :  FeeCollectionController

    // Begin :  MemberAttendanceController
    Route::group(['MemberAttendanceController'], function () {

        Route::get('add-attendance', [MemberAttendanceController::class, 'addAttendance'])->name('addAttendance');
        Route::post('create-attendance', [MemberAttendanceController::class, 'createMemberAttendance'])->name('createMemberAttendance');
        Route::post('single-member-attendance-list', [MemberAttendanceController::class, 'singleMemberAttendanceList'])->name('singleMemberAttendanceList')->middleware('isSuperAdminOrOwner');

        Route::get('add-attendance-by-id', [MemberAttendanceController::class, 'addAttendanceById'])->name('addAttendanceById');
        Route::post('create-attendance-by-id', [MemberAttendanceController::class, 'createMemberAttendanceById'])->name('createMemberAttendanceById');
        Route::post('update-member-fee-date', [MemberAttendanceController::class, 'updateMemberFeeDate'])->name('updateMemberFeeDate');

    });
// end :  MemberAttendanceController


// Begin :   InventoryController

    Route::group(['InventoryController', 'middleware' => 'isOwner'], function () {

        Route::get('add-inventory', [InventoryController::class, 'addInventory'])->name('addInventory')->middleware('isSuperAdminOrOwner');
        Route::post('create-inventory', [InventoryController::class, 'createInventory'])->name('createInventory')->middleware('isSuperAdminOrOwner');
        Route::get('inventory-list', [InventoryController::class, 'inventoryList'])->name('inventoryList')->middleware('isSuperAdminOrOwner');
        Route::get('edit-inventory/{id}', [InventoryController::class, 'editInventory'])->name('editInventory')->middleware('isSuperAdminOrOwner');
        Route::post('update-inventory/{id}', [InventoryController::class, 'updateInventory'])->name('updateInventory')->middleware('isSuperAdminOrOwner');
    });
// end :   InventoryController


    // Begin :   TaskController


    Route::get('add-task', [TaskController::class, 'addTask'])->name('addTask')->middleware('isOwner');
    Route::post('create-task', [TaskController::class, 'createTask'])->name('createTask')->middleware('isOwner');
    Route::get('task-list', [TaskController::class, 'taskList'])->name('taskList');
    Route::get('update-status/{id}', [TaskController::class, 'updateStatus'])->name('updateStatus');
    Route::get('edit-task/{id}', [TaskController::class, 'editTask'])->name('editTask')->middleware('isOwner');
    Route::post('update-task/{id}', [TaskController::class, 'updateTask'])->name('updateTask')->middleware('isOwner');

// end :   TaskController


    // Begin : PackageController

    Route::group(['PackageController', 'middleware' => 'isOwner'], function () {
        Route::get("add-package", [PackageController::class, 'addPackage'])->name('addPackage');
        Route::post("create-package", [PackageController::class, 'createPackage'])->name('createPackage');
        Route::get("packages-list", [PackageController::class, 'packagesList'])->name('packagesList');
        Route::get("edit-package/{id}", [PackageController::class, 'editPackage'])->name('editPackage');
        Route::post("update-package/{id}", [PackageController::class, 'updatePackage'])->name('updatePackage');
    });
// end : PackageController


// Begin :  ExpenseController
    Route::group(['ExpenseController'], function () {

        Route::get('add-expense', [ExpenseController::class, 'addExpense'])->name('addExpense');
        Route::post('create-expense', [ExpenseController::class, 'createExpense'])->name('createExpense');
        Route::get('expenses-list', [ExpenseController::class, 'expenseList'])->name('expenseList');
        Route::get('edit-expense/{id}', [ExpenseController::class, 'editExpense'])->name('editExpense');
        Route::post('update-expense/{id}', [ExpenseController::class, 'updateExpense'])->name('updateExpense');
    });
// end :  ExpenseController

    // Begin :  ReportsController
    Route::group(['ReportsController', 'middleware' => 'isOwner'], function () {

        Route::get('reports', [ReportsController::class, 'reports'])->name('reports');
        Route::get('active-members-list', [ReportsController::class, 'activeMembersList'])->name('activeMembersList');
        Route::get('defaulter-members-list', [ReportsController::class, 'defaulterMembersList'])->name('defaulterMembersList');
        Route::get('employees-attendance-list', [ReportsController::class, 'employeeAttendanceList'])->name('employeeAttendanceList');
        Route::get('income-repost', [ReportsController::class, 'incomeReport'])->name('incomeReport');
        Route::get('member-attendance-report', [ReportsController::class, 'memberAttendanceReport'])->name('memberAttendanceReport');
        Route::get('expense-report', [ReportsController::class, 'expenseReport'])->name('expenseReport');
    });
// end :  ReportsController

// Begin : EmployeePackageController

    Route::group(['EmployeePackageController', 'middleware' => 'isOwner'], function () {
        Route::get("add-employee-package", [EmployeePackageController::class, 'addEmployeePackage'])->name('addEmployeePackage');
        Route::post("create-employee-package", [EmployeePackageController::class, 'createEmployeePackage'])->name('createEmployeePackage');
        Route::get("employee-packages-list", [EmployeePackageController::class, 'employeePackagesList'])->name('employeePackagesList');
        Route::get("edit-employee-package/{id}", [EmployeePackageController::class, 'editEmployeePackage'])->name('editEmployeePackage');
        Route::post("update-employee-package/{id}", [EmployeePackageController::class, 'updateEmployeePackage'])->name('updateEmployeePackage');
    });
// end : PackageController

// Begin : MemberThingController

    Route::group(['MemberThingController', 'middleware' => 'isOwner'], function () {
        Route::get("add-member-thing", [MemberThingController::class, 'addMemberThing'])->name('addMemberThing');
        Route::post("create-member-thing", [MemberThingController::class, 'createThing'])->name('createThing');
        Route::get("things-list", [MemberThingController::class, 'thingsList'])->name('thingsList');
        Route::get("delete-thing/{id}", [MemberThingController::class, 'deleteThing'])->name('deleteThing');
    });
// end : MemberThingController

// Begin : UserController

//    Route::group(['UserController', 'middleware' => 'isOwner'], function () {
//        Route::get("users-list", [UserController::class, 'usersList'])->name('usersList');
//        Route::get("edit-user/{id}", [UserController::class, 'editUser'])->name('editUser');
//        Route::post("update-user/{id}", [UserController::class, 'updateUser'])->name('updateUser');
//    });
// end : UserController


// start : EmployeeController

    Route::group(['EmployeeController', 'middleware' => 'isOwner'], function () {

        Route::get('add-employee', [EmployeeController::class, 'addEmployee'])->name('addEmployee')->middleware('isOwner');
        Route::post('create-employee', [EmployeeController::class, 'createEmployee'])->name('createEmployee')->middleware('isOwner');
        Route::get('employee-list', [EmployeeController::class, 'employeeList'])->name('employeeList')->middleware('isOwner');
        Route::get('edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->name('editEmployee')->middleware('isOwner');
        Route::post('update-employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee')->middleware('isOwner');
    });
        // end : EmployeeController

// start : SalaryController
    Route::group(['SalaryController', 'middleware' => 'isOwner'], function () {

        Route::get('add-salary', [SalaryController::class, 'addSalary'])->name('addSalary')->middleware('isOwner');
        Route::post('create-salary/{id}', [SalaryController::class, 'createSalary'])->name('createSalary')->middleware('isOwner');
        Route::post('salary-history', [SalaryController::class, 'salaryHistory'])->name('salaryHistory')->middleware('isOwner');
    });
    // end : SalaryController

// start : EmployeeAttendanceController
    Route::group(['EmployeeAttendanceController'], function () {

    Route::get('add-employee-attendance', [EmployeeAttendanceController::class, 'addEmployeeAttendance'])->name('addEmployeeAttendance');
    Route::post('create-employee-attendance', [EmployeeAttendanceController::class, 'createEmployeeAttendance'])->name('createEmployeeAttendance');
    Route::post('update-employee-attendance', [EmployeeAttendanceController::class, 'updateEmployeeAttendance'])->name('updateEmployeeAttendance')->middleware('isOwner');
    Route::post('single-employee-attendance-list', [EmployeeAttendanceController::class, 'singleEmployeeAttendanceList'])->name('singleEmployeeAttendanceList')->middleware('isOwner');
});
    // end : EmployeeAttendanceController

});


Auth::routes();
Route::get('no-access', function () {
    return view('backend.no-access.access-page');
})->name('noAccess');
//Route::view('/welcome', 'welcome');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});
