<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PassportController;

Route::prefix('v1')->group(function () {
    Route::post('register', [PassportController::class, 'register']);
    Route::post('login', [PassportController::class, 'login']);

    // put all api protected routes here
    Route::middleware('auth:api')->group(function () {
        Route::post('user-detail', [PassportController::class, 'userDetail']);
        Route::post('logout', [PassportController::class, 'logout']);

        Route::apiResource('articles',App\Http\Controllers\api\v1\ArticleController::class);

        Route::get('/articles/{id}/comments', [App\Http\Controllers\api\v1\ArticleController::class, 'show_comments'])->name('show_comment');
        Route::post('/articles/{id}/comments', [App\Http\Controllers\api\v1\ArticleController::class, 'store_comments'])->name('store_comments');

        Route::get('/articles/{id}/likes', [App\Http\Controllers\api\v1\ArticleController::class, 'show_likes'])->name('show_likes');
        Route::get('/articles/{id}/views', [App\Http\Controllers\api\v1\ArticleController::class, 'show_views'])->name('show_view');

        Route::put('/articles/{id}/likes', [App\Http\Controllers\api\v1\ArticleController::class, 'like_article'])->name('like_article');
        Route::put('/articles/{id}/views', [App\Http\Controllers\api\v1\ArticleController::class, 'view_article'])->name('view_a_article');




    });
});
