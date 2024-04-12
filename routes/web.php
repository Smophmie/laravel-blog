<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LegalsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'welcome'])->name('welcome');

Route::get('/legals', [LegalsController::class, 'legals'])->name('legals');

Route::get('/about-us', [AboutUsController::class, 'about_us'])->name('about-us');

Route::group(['prefix' => '/my-posts'], function () {
    // Concerne les posts
    Route::get('/', [PostController::class, 'postslistbyauthor'])->name('postslist');

    Route::get('/create-post', [PostController::class, 'createpostform'])->name('createpost');
    Route::post('/create-post', [PostController::class, 'store'])->name('storepost');

    Route::get('/{id}/modif-post', [PostController::class, 'modifpostform'])->name('modifpost');
    Route::put('/{id}', [PostController::class, 'update'])->name('updatepost');

    Route::delete('/suppr-post/{id}', [PostController::class, 'destroy'])->name('supprpost');


})->middleware('auth');

Route::group(['prefix' => '/all-categories'], function () {
    // Concerne les catégories
    Route::get('/', [CategoryController::class, 'categorieslist'])->name('categorieslist');

    Route::get('/create-category', [CategoryController::class, 'createcategoryform'])->name('createcategory');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('storecategory');

    Route::get('/{id}/modif-category', [CategoryController::class, 'modifcategoryform'])->name('modifcategory');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('updatecategory');

    Route::delete('/suppr-category/{id}', [CategoryController::class, 'destroy'])->name('supprcategory');
    
})->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
