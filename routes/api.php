<?php


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\EnrolmentController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'prevent-back-history'],function(){


Route::post('stud', [StudentController::class, 'add']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('registerstud', [UserController::class, 'registerstud']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');



Route::group(['prefix' => 'programs', 'middleware' => 'isAdmin'], function () {
    
    Route::get('/', [ProgramController::class, 'index']);
    Route::get('/course', [ProgramController::class, 'course']);
    Route::post('add', [ProgramController::class, 'store']);
    Route::get('edit/{id}', [ProgramController::class, 'edit']);
  Route::post('update/{id}', [ProgramController::class, 'update']);
    Route::delete('delete/{id}', [ProgramController::class, 'destroy']);
});
Route::group(['prefix' => 'users', 'middleware' => 'isAdmin'], function () {
    
  Route::get('/', [UserController::class, 'index']);
 
});
Route::group(['prefix' => 'courses', 'middleware' =>'isAdmin'], function () {
    
  Route::get('/', [CourseController::class, 'index']);
  Route::post('add', [CourseController::class, 'store']);
  Route::get('edit/{id}', [CourseController::class, 'edit']);
  Route::post('update/{id}', [CourseController::class, 'update']);
  Route::delete('delete/{id}', [CourseController::class, 'destroy']);
});
Route::group(['prefix' => 'enroll', 'middleware' => 'isStudent'], function () {
    
 // Route::get('/', [EnrolmentController::class, 'index']);
  Route::post('add', [EnrolmentController::class, 'store']);
  //Route::get('edit/{id}', [EnrolmentController::class, 'edit']);
 // Route::post('update/{id}', [EnrolmentController::class, 'update']);
  //Route::delete('delete/{id}', [EnrolmentController::class, 'destroy']);
  Route::get('getprogram', [EnrolmentController::class, 'getprogram']);
});

Route::get('/course', [ProgramController::class, 'course']);

});