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

Route::resource("/usuario", "App\Http\Controllers\UsuarioController");
Route::resource("/encuentro", "App\Http\Controllers\EncuentroController");
Route::resource("/registroUsuario", "App\Http\Controllers\RegistroUsuarioController", [
    "except" => ["destroy"]    
]);

Route::delete("registroUsuario/{idUsuario}/{idEvento}", "App\Http\Controllers\RegistroUsuarioController@destroy");