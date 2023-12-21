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

//Route::get('user/updatehead', [App\Http\Controllers\UserController::class, 'updatehead']);

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth:web']], function () {

});
Route::group(['middleware' => ['guest']], function () {
    Route::get('users/login', [App\Http\Controllers\UsersController::class, 'login']);
    Route::get('users/forgotpassword', [App\Http\Controllers\UsersController::class, 'forgotpassword']);
    Route::get('users/signup', [App\Http\Controllers\UsersController::class, 'signup']);

    Route::post('users/post_signup', [App\Http\Controllers\UsersController::class, 'post_signup']);
    
    
});