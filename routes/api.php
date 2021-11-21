<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TagController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tag', [TagController::class, 'tagList']);
Route::post('/tag', [TagController::class, 'store']);
Route::get('/tag/courses', [TagController::class, 'tagShowAllCourse']);

// Listar cursos 
Route::get('/course', [CourseController::class, 'listCourse']);
// Crear curso
Route::post('/course', [CourseController::class, 'store']);