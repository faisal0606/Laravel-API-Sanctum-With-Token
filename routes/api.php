<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;

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


// public Route
// Route::get('/allstudent',[StudentController::class,'index']);
// Route::get('/allstudent/{id}',[StudentController::class,'show']);
// Route::post('/student',[StudentController::class,'store']);
// Route::put('/student/{id}',[StudentController::class,'update']);
// Route::delete('/student/{id}',[StudentController::class,'destroy']);
// Route::get('/student/search/{city}',[StudentController::class,'search']);



 Route::post('/registration',[UserController::class,'registration']);
 Route::post('/login', [UserController::class, 'login']);

//Authenticate API one by one

// Route::middleware('auth:sanctum')->get('/allstudent',[StudentController::class,'index']);
// Route::middleware('auth:sanctum')->get('/allstudent/{id}',[StudentController::class,'show']);


//Authenticate Group middleware 

Route::middleware('auth:sanctum')->group(function(){


    Route::get('/allstudent',[StudentController::class,'index']);
    Route::get('/allstudent/{id}',[StudentController::class,'show']);
    Route::post('/student',[StudentController::class,'store']);
    Route::put('/student/{id}',[StudentController::class,'update']);
    Route::delete('/student/{id}',[StudentController::class,'destroy']);
    Route::get('/student/search/{city}',[StudentController::class,'search']);
    Route::get('/logout', [UserController::class, 'logout']);


});






