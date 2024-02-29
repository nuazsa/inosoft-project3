<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('register', [UserController::class, 'register']);
    Route::group([
        'middleware' => 'api'
    ], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('me', [AuthController::class, 'me']);

        /**
         * ex: fitur
         */
        Route::get('/show_todo', [TodoController::class, 'showTodo']);
        Route::post('/create_todo', [TodoController::class, 'createTodo']);
        Route::patch('/update_todo', [TodoController::class, 'updateTodo']);
        Route::delete('/delete_todo', [TodoController::class, 'deleteTodo']);
    });
});