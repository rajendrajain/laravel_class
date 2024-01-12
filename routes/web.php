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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('users/dashboard', [App\Http\Controllers\UsersController::class, 'dashboard']);
    Route::get('home', [App\Http\Controllers\UsersController::class, 'dashboard']);
    Route::get('users/manageusers', [App\Http\Controllers\UsersController::class, 'manageusers']);
    Route::get('users/view/{str}', [App\Http\Controllers\UsersController::class, 'view']);
    Route::get('users/edit/{str}', [App\Http\Controllers\UsersController::class, 'edit']);
    Route::post('users/post_edit/{str}', [App\Http\Controllers\UsersController::class, 'post_edit']);

    Route::get('users/profile/{str}', [App\Http\Controllers\UsersController::class, 'profile']);
    Route::post('users/post_profile/{str}', [App\Http\Controllers\UsersController::class, 'post_profile']);
    Route::get('users/logout', [App\Http\Controllers\UsersController::class, 'logout']);
    Route::get('users/exprience/{str}', [App\Http\Controllers\UsersController::class, 'exprience']);
    Route::post('users/post_exprience/{str}', [App\Http\Controllers\UsersController::class, 'post_exprience']);
    Route::get('users/view_experince/{str}', [App\Http\Controllers\UsersController::class, 'view_experince']);

    Route::get('users/edit_experince/{id}', [App\Http\Controllers\UsersController::class, 'edit_experince']);
    Route::post('users/post_edit_experince/{id}', [App\Http\Controllers\UsersController::class, 'post_edit_experince']);

    Route::get('users/delete_experince/{id}', [App\Http\Controllers\UsersController::class, 'delete_experince']);
    
    
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [App\Http\Controllers\UsersController::class, 'login']);
    Route::get('users/login', [App\Http\Controllers\UsersController::class, 'login']);
    Route::get('users/forgotpassword', [App\Http\Controllers\UsersController::class, 'forgotpassword']);
    Route::get('users/signup', [App\Http\Controllers\UsersController::class, 'signup']);

    Route::post('users/post_signup', [App\Http\Controllers\UsersController::class, 'post_signup']);
    Route::post('users/login_post', [App\Http\Controllers\UsersController::class, 'login_post']);
    
    
});