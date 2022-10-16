<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Get all Todos

Route::get('todos',[TodoController::class, 'getTodo']);


//Add new todo
Route::post('addTodo',[TodoController::class,'addTodo']);


//Update todocomplete
Route::put('updateTodo/{id}',[TodoController::class,'updateTodo']);

//Update tododata
Route::put('updateTodoData/{id}',[TodoController::class,'updateTodoData']);



//Delete todo
Route::delete('deleteTodo/{id}',[TodoController::class,'deleteTodo']);
