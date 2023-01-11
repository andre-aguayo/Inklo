<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

Route::get('isconnected', function () {
    return response()->json(['isconnectes' => true]);
})->middleware(['api.response']);

Route::post('salvar-local', [UserController::class, 'store'])->middleware(['api.response'])->name('user.store');
