<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VisitController;

use App\Http\Controllers\Api\UserController;



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

Route::apiResource('categories', CategoryController::class);
Route::apiResource('roles', RoleController::class);

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user/info', [UserController::class, 'getAuthenticatedUser']);

});

Route::apiResource('posts', PostController::class);
Route::apiResource('visits', VisitController::class);

