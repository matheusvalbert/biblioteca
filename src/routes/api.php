<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StateController;

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

    Route::group(['prefix' => '/book/state'], function () {
        Route::post('/', [StateController::class, 'store']);
        Route::get('/{id}', [StateController::class, 'show']);
        Route::delete('/{id}', [StateController::class, 'destroy']);
        Route::get('/', [StateController::class, 'index']);
    });
});

