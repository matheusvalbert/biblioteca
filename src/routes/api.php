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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/testando', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => '/books'], function () {

        Route::group([
            'prefix' => '/state',
            'controller' => BookStatesController::class
        ], function () {
            Route::post('/', 'store');
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::delete('/{id}', 'destroy');
        });

        Route::controller(BookController::class)->group(function () {
            Route::post('/', 'store');
            Route::get('/', 'index');
            Route::get('/{book}', 'show');
            Route::put('/{book}', 'update');
            Route::delete('/{book}', 'destroy');
        });
    });

    Route::group([
        'prefix' => '/comments',
        'controller' => CommentController::class
    ], function () {
        Route::get('/{book}', 'index');
        Route::post('/', 'store');
    });
});

