<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialMediaController;

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

Route::post('users', [UserController::class, 'store']);

Route::get('users', [UserController::class, 'index']);

Route::patch('users/{id}', [UserController::class, 'update']);

Route::post('social-media', [SocialMediaController::class, 'store']);

Route::get('social-media', [SocialMediaController::class, 'index']);

Route::post('users/{userId}/social-media', [UserController::class, 'addSocialMedia']);

Route::get('users/{userId}/social-media', [UserController::class, 'getSocialMedia']);
