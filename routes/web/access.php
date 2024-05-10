<?php

use App\Enums\RoutesNamesEnum;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\RoutesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth','maintenance']], function () {
    Route::get('/noAccess', [AuthController::class, 'noAccessPage'])->name('noAccess');
    Route::get('/changePassword', [AuthController::class, 'changePasswordPage'])->name('changePassword');
    Route::get('/changeEmail', [AuthController::class, 'changeEmailPage'])->name('changeEmail');
    Route::get('/home', [RoutesController::class, 'showUserPage'])->name(RoutesNamesEnum::USER_ROUTE);
    Route::get('/profile', [RoutesController::class, 'showProfilePage'])->name(RoutesNamesEnum::PROFILE_ROUTE);
    // Establishment Route with optional 'id' parameter
    Route::middleware('can:admin-access')->group(function () {
        Route::get('/dashboard', [RoutesController::class, 'showAdminPage'])->name(RoutesNamesEnum::ADMIN_ROUTE);
        Route::get('/manageUsers', [RoutesController::class, 'showUsersPage'])->name("users");
    });
    Route::middleware('can:doctor-access')->group(function () {
        Route::get('/patients/{patientId?}', [RoutesController::class, 'showPatientPage'])->name('patient');
    });
});
