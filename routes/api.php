<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'articles'], function () {

    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/search', [ArticleController::class, 'search']);

});
