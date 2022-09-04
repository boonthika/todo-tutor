<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\todocontroller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

route::get('/hello', function() {
    return'hello world';
});

route::get('/hello-may', function() {
    return'hello-may';
});

route::post('/register', [AuthController::class, 'register']);
route::post('/login', [AuthController::class, 'login']);

route::group(['middleware'=> ['auth:sanctum']], function() {
    route::get('/todo', [todocontroller::class, 'index']);
    route::get('/todo/{id}', [todocontroller::class, 'show']);
    route::post('/todo', [todocontroller::class, 'store']);
    route::put('/todo/{id}', [todocontroller::class, 'update']);
    route::delete('/todo/{id}', [todocontroller::class, 'destroy']);

    route::post('/logout',[AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
