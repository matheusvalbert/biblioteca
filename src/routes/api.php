<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\BookStatesController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/testando', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => '/books'], function () {

        Route::group(['prefix' => '/state'], function () {
            Route::get('/', [BookStatesController::class, 'index']);
            Route::post('/', [BookStatesController::class, 'store']);
            Route::get('/{id}', [BookStatesController::class, 'show']);
            Route::delete('/{id}', [BookStatesController::class, 'destroy']);
        });

        Route::put('/{book}', [BookController::class, 'update']);
        Route::get('/', [BookController::class, 'index']);
        Route::post('/store', [BookController::class, 'store']);
        Route::get('/{book}', [BookController::class, 'show']);
        Route::delete('/{book}', [BookController::class, 'destroy']);
    });

    Route::group(['prefix' => '/comments'], function () {
        Route::get('/{book}', [CommentController::class, 'index']);
        Route::post('/store', [CommentController::class, 'store']);
    });
});

