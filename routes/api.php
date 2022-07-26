<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
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

// Route::group(['middleware' => ['jwt.verify']], function (){
//     Route::get('/usuarios',[UsuarioController::class, 'index']);
//     Route::post('/usuario',[UsuarioController::class, 'store']);
//     Route::get('/usuario/{id}',[UsuarioController::class, 'show']);
//     Route::put('/usuario/{id}',[UsuarioController::class, 'update']);
//     Route::delete('/usuario/{id}',[UsuarioController::class, 'destroy']);
// });

Route::controller(UsuarioController::class)->group( function () {
    Route::get('/usuarios', 'index');
    Route::post('/usuario', 'store');
    Route::get('/usuario/{id}', 'show');
    Route::put('/usuario/{id}', 'update');
    Route::delete('/usuario/{id}', 'destroy');
});
Route::post('/login', 'UserController@authenticate');
