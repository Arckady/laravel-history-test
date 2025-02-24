<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/test', [TestController::class, 'test']);
