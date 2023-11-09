<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

//Dashboard Management
Route::get('/dashboard',[DashboardController::class,'dashboard'] )->middleware(['auth', 'verified'])->name('dashboard');

//User Management
Route::resource('/user',UserController::class);
Route::get('/approve/{id}',[UserController::class,'approve'])->name('user.approve');

//Role Permission Management
Route::resource('role-permission',RolePermissionController::class);













require __DIR__.'/auth.php';
