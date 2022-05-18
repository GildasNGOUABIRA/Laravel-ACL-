<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('attach-permission/{role}','App\Http\Controllers\RoleController@attachPermission')->name('attach.permission')->middleware(['auth','role:superadministrator']);

Route::resource('user', UserController::class)->middleware(['auth','role:superadministrator']);

Route::resource('role', RoleController::class)->middleware(['auth','role:superadministrator']);

Route::resource('permission', PermissionController::class)->middleware(['auth','role:superadministrator']);



// Route::post('attach-permission/{role}','App\Http\Controllers\RoleController@attachPermission')->name('attach.permission')->middleware(['auth']);

// Route::resource('user', UserController::class)->middleware(['auth']);

// Route::resource('role', RoleController::class)->middleware(['auth']);

// Route::resource('permission', PermissionController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
