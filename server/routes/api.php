<?php
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\UserController;
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

Route::get('/', function (Request $request) {
    $response = [
        "status" => 401,
        "message" => "Unauthorized"
    ];
    return response()->json($response, 401);
})->name('unauthorized');

Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->controller(PostController::class)->group(function () {
    Route::get('posts', 'index');
    Route::get('posts/{id}', 'show');
    Route::post('posts', 'store');
});

Route::middleware('auth:api')->controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::get('users/{id}', 'show');
    Route::post('users', 'store');
});

Route::middleware('auth:api')->controller(CommentController::class)->group(function () {
    Route::get('comments', 'index');
    Route::get('comments/{id}', 'show');
    Route::post('comments', 'store');
});