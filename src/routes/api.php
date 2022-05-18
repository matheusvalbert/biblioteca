<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

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

    Route::put('/books/{book}', [BookController::class, 'update']);
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/books/store', [BookController::class, 'store']);
    Route::get('/books/{book}', [BookController::class, 'show']);
    Route::delete('books/{book}', [BookController::class, 'destroy']);

    Route::get('/comments/{book}', [CommentController::class, 'index']);
    Route::post('/comments/store', [CommentController::class, 'store']);

    Route::post('/book/state', [BookController::class, 'state']);
    Route::get('/book/state/{id}', [BookController::class, 'show_state']);
    Route::delete('/book/state', [BookController::class, 'delete_state']);
});

