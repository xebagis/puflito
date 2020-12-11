<?php

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

Route::get("doGet", "App\Http\Controllers\TestController@doGet");
Route::get("doGet/{id}", "App\Http\Controllers\TestController@doGetId");
Route::post("doPost", "App\Http\Controllers\TestController@doPost");
Route::put("doPut/{id}", "App\Http\Controllers\TestController@doPut");
Route::delete("doDelete/{id}", "App\Http\Controllers\TestController@doDelete");

