<?php

use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\TaskController;
use App\Jobs\SendMessage;
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
use \App\Http\Controllers\backend\UserController;

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
    Route::post('/send-sms', [DashboardController::class, 'sendSms'])->name('sendSms');

    // start : UserController
    Route::group(['UserController'], function () {
        // Route to add a gym
        Route::get('add-gym', [UserController::class, 'addGym'])->name('addGym')->middleware('developer');
        // Route to create a gym
        Route::post('create-gym', [UserController::class, 'createGym'])->name('createGym')->middleware('developer');
        // Route to list gyms
        Route::get('gym-list', [UserController::class, 'gymList'])->name('gymList')->middleware('developer');
        // Route to edit a gym
        Route::get('edit-gym/{id}', [UserController::class, 'editGym'])->name('editGym')->middleware('developer');
        // Route to update a gym
        Route::post('update-gym/{id}', [UserController::class, 'updateGym'])->name('updateGym')->middleware('developer');
        // Route to add a user
        Route::get('add-user', [UserController::class, 'addUser'])->name('addUser')->middleware('isOwner');
        // Route to create a user
        Route::post('create-user', [UserController::class, 'createUser'])->name('createUser')->middleware('isOwner');
        // Route to list users
        Route::get('user-list', [UserController::class, 'userList'])->name('userList')->middleware('isOwner');
        // Route to edit a user
        Route::get('edit-user/{id}', [UserController::class, 'editUser'])->name('editUser')->middleware('isOwner');
        // Route to update a user
        Route::post('update-user/{id}', [UserController::class, 'updateUser'])->name('updateUser')->middleware('isOwner');
    });
    // end : UserController

    // Begin : PackageController
    Route::group(['PackageController', 'middleware' => 'isOwner'], function () {
        // Group of routes related to PackageController accessible to owners
        Route::get("add-package", [PackageController::class, 'addPackage'])->name('addPackage');
        // Route to display form for adding a package
        Route::post("create-package", [PackageController::class, 'createPackage'])->name('createPackage');
        // Route to handle package creation
        Route::get("packages-list", [PackageController::class, 'packagesList'])->name('packagesList');
        // Route to display the list of packages
        Route::get("edit-package/{id}", [PackageController::class, 'editPackage'])->name('editPackage');
        // Route to display form for editing a package
        Route::post("update-package/{id}", [PackageController::class, 'updatePackage'])->name('updatePackage');
        // Route to handle package updates
    });
    // end : PackageController

    // Begin: MemberController
    Route::group(['MemberController'], function () {
        Route::get('add-member', [MemberController::class, 'addMember'])->name('addMember')->middleware('isSuperAdminOrOwner');
        // Route to display form for adding a member
        Route::post('create-member', [MemberController::class, 'createMember'])->name('createMember')->middleware('isSuperAdminOrOwner');
        // Route to handle member creation
        Route::get('members-list', [MemberController::class, 'memberList'])->name('memberList')->middleware('isSuperAdminOrOwner');
        // Route to display the list of members
        Route::get('edit-member/{id}', [MemberController::class, 'editMember'])->name('editMember')->middleware('isSuperAdminOrOwner');
        // Route to display form for editing a member
        Route::post('update-member/{id}', [MemberController::class, 'updateMember'])->name('updateMember')->middleware('isSuperAdminOrOwner');
        // Route to handle member updates
        Route::post('update-member-date', [MemberController::class, 'updateMemberDate'])->name('updateMemberDate')->middleware('isSuperAdminOrOwner');
        // Route to update member dates
        Route::get('export-members', [MemberController::class, 'memberExport'])->name('memberExport')->middleware('isOwner');
        // Route to export members (accessible to owners)
        Route::post('import-members', [MemberController::class, 'memberImport'])->name('memberImport')->middleware('isOwner');
        // Route to import members (accessible to owners)
        Route::get('personal-trainer', [MemberController::class, 'personalTraining'])->name('personalTraining')->middleware('isTrainer');
        // Route to display personal training information (accessible to trainers)




    });
// end: MemberController
// begin: MemberAttendanceController
    Route::group(['MemberAttendanceController'], function () {
        // Define a route for adding attendance, linked to the 'addAttendance' method in the MemberAttendanceController
        Route::get('add-attendance', [MemberAttendanceController::class, 'addAttendance'])->name('addAttendance');
        // Define a route for creating member attendance, linked to the 'createMemberAttendance' method
        Route::post('create-attendance', [MemberAttendanceController::class, 'createMemberAttendance'])->name('createMemberAttendance');
        // Define a route for retrieving a single member's attendance list, linked to the 'singleMemberAttendanceList' method
        Route::post('single-member-attendance-list', [MemberAttendanceController::class, 'singleMemberAttendanceList'])
            ->name('singleMemberAttendanceList')
            ->middleware('isSuperAdminOrOwner');
        // Define a route for adding attendance by ID, linked to the 'addAttendanceById' method
        Route::get('add-attendance-by-id', [MemberAttendanceController::class, 'addAttendanceById'])->name('addAttendanceById');
        // Define a route for creating member attendance by ID, linked to the 'createMemberAttendanceById' method
        Route::post('create-attendance-by-id', [MemberAttendanceController::class, 'createMemberAttendanceById'])
            ->name('createMemberAttendanceById');
        // Define a route for updating member fee date, linked to the 'updateMemberFeeDate' method
        Route::post('update-member-fee-date', [MemberAttendanceController::class, 'updateMemberFeeDate'])->name('updateMemberFeeDate');
    });
// End: MemberAttendanceController

// Begin :  FeeCollectionController
    Route::group(['FeeCollectionController'], function () {
        Route::get('add-fee', [FeeCollectionController::class, 'addFee'])->name('addFee')->middleware('isSuperAdminOrOwner');
        Route::post('create-fee/{id}', [FeeCollectionController::class, 'createFee'])->name('createFee')->middleware('isSuperAdminOrOwner');
        Route::post('fee-history', [FeeCollectionController::class, 'feeHistory'])->name('feeHistory')->middleware('isOwner');
    });
// end   :  FeeCollectionController
    // Begin : EmployeePackageController

    Route::group(['EmployeePackageController', 'middleware' => 'isOwner'], function () {
        Route::get("add-employee-package", [EmployeePackageController::class, 'addEmployeePackage'])->name('addEmployeePackage');
        Route::post("create-employee-package", [EmployeePackageController::class, 'createEmployeePackage'])->name('createEmployeePackage');
        Route::get("employee-packages-list", [EmployeePackageController::class, 'employeePackagesList'])->name('employeePackagesList');
        Route::get("edit-employee-package/{id}", [EmployeePackageController::class, 'editEmployeePackage'])->name('editEmployeePackage');
        Route::post("update-employee-package/{id}", [EmployeePackageController::class, 'updateEmployeePackage'])->name('updateEmployeePackage');
    });
    // end : EmployeePackageController
    // start : EmployeeController

    Route::group(['EmployeeController', 'middleware' => 'isOwner'], function () {
        Route::get('add-employee', [EmployeeController::class, 'addEmployee'])->name('addEmployee')->middleware('isOwner');
        Route::post('create-employee', [EmployeeController::class, 'createEmployee'])->name('createEmployee')->middleware('isOwner');
        Route::get('employee-list', [EmployeeController::class, 'employeeList'])->name('employeeList')->middleware('isOwner');
        Route::get('edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->name('editEmployee')->middleware('isOwner');
        Route::post('update-employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee')->middleware('isOwner');
    });
// end : EmployeeController

    // start : EmployeeAttendanceController
    Route::group(['EmployeeAttendanceController'], function () {

        Route::get('add-employee-attendance', [EmployeeAttendanceController::class, 'addEmployeeAttendance'])->name('addEmployeeAttendance');
        Route::post('create-employee-attendance', [EmployeeAttendanceController::class, 'createEmployeeAttendance'])->name('createEmployeeAttendance');
        Route::post('update-employee-attendance', [EmployeeAttendanceController::class, 'updateEmployeeAttendance'])->name('updateEmployeeAttendance');
        Route::post('single-employee-attendance-list', [EmployeeAttendanceController::class, 'singleEmployeeAttendanceList'])->name('singleEmployeeAttendanceList')->middleware('isOwner');
    });
// end : EmployeeAttendanceController

// start : SalaryController
    Route::group(['SalaryController', 'middleware' => 'isOwner'], function () {
        Route::get('add-salary', [SalaryController::class, 'addSalary'])->name('addSalary')->middleware('isOwner');
        Route::post('create-salary/{id}', [SalaryController::class, 'createSalary'])->name('createSalary')->middleware('isOwner');
        Route::post('salary-history', [SalaryController::class, 'salaryHistory'])->name('salaryHistory')->middleware('isOwner');
    });
// end : SalaryController

// Begin :   InventoryController
    Route::group(['InventoryController', 'middleware' => 'isOwner'], function () {
        Route::get('add-inventory', [InventoryController::class, 'addInventory'])->name('addInventory')->middleware('isSuperAdminOrOwner');
        Route::post('create-inventory', [InventoryController::class, 'createInventory'])->name('createInventory')->middleware('isSuperAdminOrOwner');
        Route::get('inventory-list', [InventoryController::class, 'inventoryList'])->name('inventoryList')->middleware('isSuperAdminOrOwner');
        Route::get('edit-inventory/{id}', [InventoryController::class, 'editInventory'])->name('editInventory')->middleware('isSuperAdminOrOwner');
        Route::post('update-inventory/{id}', [InventoryController::class, 'updateInventory'])->name('updateInventory')->middleware('isSuperAdminOrOwner');
    });
// end :   InventoryController
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
        Route::get('daily-member-attendance', [ReportsController::class, 'dailyMemberAttendance'])->name('dailyMemberAttendance');
        Route::get('daily-employee-attendance', [ReportsController::class, 'dailyEmployeeAttendance'])->name('dailyEmployeeAttendance');
    });
// end :  ReportsController

    // start : MessageController
//    Route::group(['MessageController', 'middleware' => 'isOwner'], function () {
//
//        Route::get('add-message', [MessageController::class, 'addMessage'])->name('addMessage')->middleware('isOwner');
//        Route::post('create-message', [MessageController::class, 'createMessage'])->name('createMessage')->middleware('isOwner');
//        Route::get('message-list', [MessageController::class, 'messageList'])->name('messageList')->middleware('isOwner');
//    });
// end : MessageController
});

Auth::routes();
Route::get('no-access', function () {
    return view('backend.no-access.access-page');
})->name('noAccess');
//Route::view('/welcome', 'welcome');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
})->name('/');



Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});


//Route::get('/send', function () {
//    // Assuming you have an array of member IDs or you can retrieve them from the database
//
//    dispatch(new SendMessage()->delay(now()->addSecond(10));
//
//
//});

// Begin :   TaskController
//Route::get('add-task', [TaskController::class, 'addTask'])->name('addTask')->middleware('isOwner');
//Route::post('create-task', [TaskController::class, 'createTask'])->name('createTask')->middleware('isOwner');
//Route::get('task-list', [TaskController::class, 'taskList'])->name('taskList');
//Route::get('update-status/{id}', [TaskController::class, 'updateStatus'])->name('updateStatus');
//Route::get('edit-task/{id}', [TaskController::class, 'editTask'])->name('editTask')->middleware('isOwner');
//Route::post('update-task/{id}', [TaskController::class, 'updateTask'])->name('updateTask')->middleware('isOwner');
// end :   TaskController
// Begin : MemberThingController
//Route::group(['MemberThingController', 'middleware' => 'isOwner'], function () {
//    Route::get("add-member-thing", [MemberThingController::class, 'addMemberThing'])->name('addMemberThing');
//    Route::post("create-member-thing", [MemberThingController::class, 'createThing'])->name('createThing');
//    Route::get("things-list", [MemberThingController::class, 'thingsList'])->name('thingsList');
//    Route::get("delete-thing/{id}", [MemberThingController::class, 'deleteThing'])->name('deleteThing');
//});
// end : MemberThingController




//Route::get('copy', [MemberController::class, 'copyData'])->name('copyData')->middleware('isOwner');

//Route::get('/session', function () {
//    // Retrieve all session data
//    $allSessionData = session()->all();
//
//    // Dump and Die to inspect the session data
//    dd($allSessionData);
//});
