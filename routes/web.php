<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\StudentController as StudentController;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix" => "admin/", "as" => "admin."], function () {
    Route::get("dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::group(["prefix" => "student/", "as" => "student."], function () {
        Route::get("", [StudentController::class, "index"])->name("index");
        Route::get("create", [StudentController::class, "create"])->name("create");
        Route::post("store", [StudentController::class, "store"])->name("store");
        Route::get("edit/{id}", [StudentController::class, "edit"])->name("edit");
        Route::match(["put", "patch"], "update/{id}", [StudentController::class, "update"])->name("update");
    });
});
