<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserPostsController;
use App\Http\Controllers\Api\PermissionController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Route::middleware('auth:sanctum')
//     ->get('/user', function (Request $request) {
//         return $request->user();
//     })
//     ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
    Route::get('profile', [UserController::class,'show']);
    Route::get('users/{user}', [UserController::class,'show']);


        // Route::post('/posts/{post}/comment', [PostController::class,'like',]);
        //  Route::post('comments',function(){
        //     return "ok";
        //  });//->name('users.posts.store');
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        // User Posts
        Route::get('/users/{user}/posts', [UserPostsController::class,'index',])->name('users.posts.index');
        Route::post('/users/{user}/posts', [UserPostsController::class,'store',])->name('users.posts.store');

        Route::post('/posts/{post}/like', [PostController::class,'like',]);
        Route::post('/posts/{post}/unlike', [PostController::class,'unlike',]);//->name('users.posts.store');
        
        
        // Route::delete('/posts/{post}/comment/{comment}', [PostController::class,'unlike',]);//->name('users.posts.store');

        Route::apiResource('posts', PostController::class);
        Route::post('comments/{comment}/reply', [CommentsController::class,'reply']);
        Route::apiResource('comments', CommentsController::class);

    });
