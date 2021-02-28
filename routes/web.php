<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SociosController;

use Illuminate\Http\Request;

// use App\Http\Controller;
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

Route::get('/list-socios', "App\Http\Controllers\SociosController@index");
Route::post('/create-socio/', "App\Http\Controllers\SociosController@create");
Route::post('/delete-socio/', "App\Http\Controllers\SociosController@delete");


Route::get('/list-clubes', "App\Http\Controllers\ClubesController@listClubes");
Route::post('/create-clube', "App\Http\Controllers\ClubesController@createClube");
Route::post('/delete-clube', "App\Http\Controllers\ClubesController@deleteClube");

Route::get('/list-usuarios-clubes', "App\Http\Controllers\SociosClubesController@listUsuariosClubes");
// Route::post('create-usuario-clube', "App\Http\Controllers\SociosClubesController@createUsuarioClube");
Route::post('/create-usuario-clube', "App\Http\Controllers\SociosClubesController@createUsuarioNome");
Route::post('/delete-usuario-clube', "App\Http\Controllers\SociosClubesController@deleteUsuario");

