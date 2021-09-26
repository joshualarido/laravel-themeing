<?php

use App\Http\Controllers\BlogListController;
use Illuminate\Support\Facades\Route;
use App\Providers\ThemeServiceProvider;
use App\Http\Controllers\Site;
use App\Http\Controllers\Admin;

/**
 * Site Routes
 */
Route::get('/themes/{filePath}', function($filePath){
    ThemeServiceProvider::serveAsset('themes/site/' . $filePath);
})->where('filePath', '([A-z0-9\/_\-\.]+)?');

Route::get('/', [Site\Frontpage::class, 'index'])->name('home');

Route::get('/blog', [Site\BlogController::class, 'index'])->name('blog');

Route::get('/blogpost/{id}', [Site\BlogPostController::class, 'index']);
