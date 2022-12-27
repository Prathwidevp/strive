<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;


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

Route::get('/', [EmployeeController::class,'index']);

//employee
Route::get('/employees',[EmployeeController::class,'index']);
Route::get('/add-employee',[EmployeeController::class,'create']);
Route::post('/add-employee',[EmployeeController::class,'store']);
Route::get('/edit-employee/{id}',[EmployeeController::class,'edit']);
Route::put('/update-employee/{id}',[EmployeeController::class,'update']);
Route::get('/delete-employee/{id}',[EmployeeController::class,'destroy']);


//role
Route::get('/add-role',[RoleController::class,'addrole']);


