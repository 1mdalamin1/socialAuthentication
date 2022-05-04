<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\Auth\{

//     AuthenticatedSessionController,
//     ConfirmablePasswordController,
//     EmailVerificationNotificationController,
//     EmailVerificationPromptController,
//     NewPasswordController,
//     PasswordResetLinkController,
//     RegisteredUserController,
//     VerifyEmailController
// };
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

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.confirm');


Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', function () {
        return Auth::user();
        return view('welcome');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Route::get('users', [UsersController::class, 'index']);
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::get('groups', [UserGroupsController::class, 'index'])->name('groups');
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

    Route::resource('users', UsersController::class); // except -> create route without show
    //Route::resource('users', UsersController::class, ['except' => ['show'] ]); // except -> create route without show
    //Route::resource('users', UsersController::class, ['only' => ['show', 'destroy'] ]); // only -> create route only show , destroy

    /*
    7 in 1 This Route::resource('users', UsersController::class); in blow
    Route::get('users', [UsersController::class, 'index']);
    Route::POST('users', [UsersController::class, 'store']);
    Route::POST('users/create', [UsersController::class, 'create']);
    Route::POST('users/{user}', [UsersController::class, 'show']);
    Route::POST('users/{user}', [UsersController::class, 'update']);
    Route::POST('users/{user}', [UsersController::class, 'destroy']);
    Route::POST('users/{user}/edit', [UsersController::class, 'edit']);
    */

    Route::resource('categories', CategoryController::class, ['except' => ['show'] ]);
    Route::resource('products', ProductController::class);

});

   # Group Routers
// Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function () {

//     Route::get('/', 'index')->name('index');
//     Route::get('/details/{order}', 'details')->name('details');
//     Route::post('/status/{order}', 'status')->name('status');
// });
