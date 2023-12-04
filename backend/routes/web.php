<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AttendacneController;

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
    return view('welcome');
});

Route::get('/get_element_count', [GeneralController::class, 'getElementCount']);
Route::get('/get_group_by_owners', [OwnerController::class, 'getGroupByOwnerService']);
Route::get('/store', [AttendacneController::class, 'uploadExcelFile']);
