<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(PostsController::class)->group(function () {
    Route::post('/posts/create', 'create');
    Route::delete('/posts/delete', 'delete');
    Route::get('/posts/read/', 'readAll');
    Route::get('/posts/read/{id}', 'read');
    Route::put('/posts/update/{id}', 'update');
});
