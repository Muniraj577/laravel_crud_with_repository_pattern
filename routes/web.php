<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController as StudentController;


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

Route::group(["prefix"=>"student/", "as"=>"student."], function(){
    Route::get("", [StudentController::class, "index"])->name("index");
    Route::get("create", [StudentController::class, "create"])->name("create");
    Route::post("store", [StudentController::class, "store"])->name("store");
});


