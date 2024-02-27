<?php

use App\Http\Controllers\TodoController;
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

Route::get('/show_todo', [TodoController::class, 'showTodo']);
Route::post('/create_todo', [TodoController::class, 'createTodo']);
Route::patch('/update_todo', [TodoController::class, 'updateTodo']);
Route::delete('/delete_todo', [TodoController::class, 'deleteTodo']);

/**
* ex: fitur tambahan
*/
Route::post('/assign_todo', [TodoController::class, 'assignTodo']);
Route::delete('/unassign_todo', [TodoController::class, 'unassignTodo']);
Route::post('/create_subtodo', [TodoController::class, 'createSubTodo']);
Route::delete('/delete_subtodo', [TodoController::class, 'deleteSubTodo']);