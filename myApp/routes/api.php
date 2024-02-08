<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);


//Route::post("login", [MemberController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get("all-members-list", [MemberController::class, 'membersList']);

});

//Route::get("packages-list", [\App\Http\Controllers\Api\PackageController::class, 'packagesList']);
//Route::post("all-members-list", [MemberController::class, 'membersList']);
//Route::get("defaulter-members-list", [MemberController::class, 'defaulterMembersFeeList']);
//Route::get("active-members-list", [MemberController::class, 'activeMembersList']);
//Route::get("new-members-list", [MemberController::class, 'newMembersList']);
//Route::get("daily-members-fee-list", [MemberController::class, 'dailyMembersFeeList']);
//Route::get("night-shift-members-list", [MemberController::class, 'nightShiftMembersList']);
//Route::get("evening-shift-members-list", [MemberController::class, 'eveningShiftMembersList']);
//Route::get("morning-shift-members-list", [MemberController::class, 'morningShiftMembersList']);
//
//
//Route::get("store-api-status-and-date", [MemberController::class, 'storeStatusAndDate']);
