<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api', 'scopes:create-posts'])->post('/posts/new', function (Request $request) {
    return $request->user()->posts()->create($request->only(['title', 'content']));
});

Route::get('/posts', function(Request $request) {
    return \App\Models\Post::with('user')->get();
});
