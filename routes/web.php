<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use \App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|`
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', 'ImageController@show');
Route::get('/', [ImageController::class, 'show']);

//Route::get('/login', 'AuthController@loginPage');
Route::get('/login', [AuthController::class, 'loginPage']);

//Route::get('/logout', 'AuthController@logout');
Route::get('/logout', [AuthController::class, 'logout']);


//Route::post('/login', 'AuthController@login');
Route::post('/login', [AuthController::class, 'login']);


//Route::post('/photo', 'ImageController@create');
//Route::delete('/delete', 'ImageController@delete');
//Route::post('/perm', 'ImageController@permit');
//Route::post('/edit/{id}', 'ImageController@edit');
//Route::post('/editsave/{id}', 'ImageController@editsave');

Route::post('/photo', [ImageController::class, 'create']);
Route::delete('/delete', [ImageController::class, 'delete']);
Route::post('/perm', [ImageController::class, 'permit']);
Route::post('/edit/{id}', [ImageController::class, 'edit']);
Route::post('/editsave/{id}', [ImageController::class, 'editsave']);
