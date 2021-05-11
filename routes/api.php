<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SinopsisController;
use App\Http\Controllers\AuthController;

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

Route::resource('prestamo', PrestamoController::class);
Route::resource('pelicula', PeliculaController::class);
Route::resource('persona', PersonaController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('genero', GeneroController::class);
Route::resource('sinopsis',SinopsisController::class);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'signup']);
/*
Route::get('user', [AuthController::class, 'getUser'])-> middleware('auth:api');
Route::post('logout', [AuthController::class, 'logout'])->middlware('auth:api');
*/
//Route::group(['middleware' => 'auth.api'], function(){
//    Route::get('user', [AuthController::class, 'getUser']);
//    Route::post('logout', [AuthController::class, 'logout']);
//});