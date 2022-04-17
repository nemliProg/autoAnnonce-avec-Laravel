<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DemandController;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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




// user register
Route::post('/register', [UserController::class, 'register']);
// user login
Route::post('/login', [UserController::class, 'login']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    // get all users
    Route::get('/users', [UserController::class, 'index']);
    // find a user
    Route::get('/users/{id}', [UserController::class, 'show']);
    // Search for a user by name
    Route::get('/users/search/{name}', [UserController::class, 'search']);
    // update a user
    Route::put('/users/{id}', [UserController::class, 'update']);
    // delete a user
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    // user logout
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/offer', [OfferController::class, 'index']);
    Route::get('/offer/{id}', [OfferController::class, 'show']);
    Route::get('/offer/search/{title}', [OfferController::class, 'search']);
    Route::post('/offer', [OfferController::class, 'store']);
    Route::post('/offer/{id}', [OfferController::class, 'update']);
    Route::delete('/offer/{id}', [OfferController::class, 'destroy']);

    Route::get('/demand', [demandController::class, 'index']);
    Route::get('/demand/{id}', [demandController::class, 'show']);
    Route::get('/demand/search/{title}', [demandController::class, 'search']);
    Route::post('/demand', [demandController::class, 'store']);
    Route::post('/demand/{id}', [demandController::class, 'update']);
    Route::delete('/demand/{id}', [demandController::class, 'destroy']);
});
