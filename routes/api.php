<?php


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProgramController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');



Route::group(['prefix' => 'programs', 'middleware' => 'auth:sanctum'], function () {
    
    Route::get('/', [ProgramController::class, 'index']);
    Route::get('/course', [ProgramController::class, 'course']);
    Route::post('add', [ProgramController::class, 'store']);
    Route::get('edit/{id}', [ProgramController::class, 'edit']);
  Route::post('update/{id}', [ProgramController::class, 'update']);
    Route::delete('delete/{id}', [ProgramController::class, 'destroy']);
});