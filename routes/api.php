<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources(['register' => UserController::class], ['only' => ['store']]);
Route::controller(AuthController::class)->group(function() {
    Route::post('login', 'login');
    Route::post('recovery-password', 'recoveryPassword');
    Route::post('reset-password', 'resetPassword');
});

Route::controller(EventController::class)->group(function() {
    Route::get('/events/today', 'today');
    Route::post('/events/select', 'select');
});

Route::apiResources([
    'news'  => NewsController::class,
]);

Route::controller(RoleController::class)->group(function() {
    Route::get('roles', 'index');
});

Route::middleware(['auth:api'])->group(function() {
    Route::controller(AuthController::class)->group(function() {
        Route::get('profile', 'profile');
        Route::get('logout', 'logout');
    });
    Route::middleware(['scope:admin'])->group(function() {
        Route::apiResources([
            'users' => UserController::class,
        ]);
    });
    Route::middleware(['scope:moder'])->group(function() {

    });
    Route::middleware(['scope:party'])->group(function() {

    });
});

