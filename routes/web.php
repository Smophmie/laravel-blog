<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LegalsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\NonAdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'welcome'])->name('welcome');

Route::get('/legals', [LegalsController::class, 'legals'])->name('legals');

Route::get('/about-us', [AboutUsController::class, 'about_us'])->name('about-us');

Route::group(['prefix' => '/my-posts', 'middleware' => ['auth', NonAdminMiddleware::class]], function () {
    // Concerne les posts accessibles aux non admin
    Route::get('/', [PostController::class, 'postslistbyauthor'])->name('postslist');

    Route::get('/create-post', [PostController::class, 'createpostform'])->name('createpost');
    Route::post('/create-post', [PostController::class, 'store'])->name('storepost');

    Route::get('/{id}/modif-post', [PostController::class, 'modifpostform'])->name('modifpost');
    Route::put('/{id}', [PostController::class, 'update'])->name('updatepost');

    Route::delete('/suppr-post/{id}', [PostController::class, 'destroy'])->name('supprpost');

});


Route::group(['prefix' => '/all-categories', 'middleware' => ['auth', AdminMiddleware::class]], function () {
    // Concerne les catégories accessibles aux admin
    Route::get('/', [CategoryController::class, 'categorieslist'])->name('categorieslist');

    Route::get('/create-category', [CategoryController::class, 'createcategoryform'])->name('createcategory');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('storecategory');

    Route::get('/{id}/modif-category', [CategoryController::class, 'modifcategoryform'])->name('modifcategory');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('updatecategory');

    Route::delete('/suppr-category/{id}', [CategoryController::class, 'destroy'])->name('supprcategory');
    
});



Route::group(['prefix' => '/all-users', 'middleware' => ['auth', AdminMiddleware::class]], function () {
    // Concerne les utilisateurs accessibles aux admin
    Route::get('/', [UserController::class, 'userslist'])->name('userslist');

    Route::get('/{id}/modif-user', [UserController::class, 'modifuserform'])->name('modifuser');
    Route::put('/{id}', [UserController::class, 'update'])->name('updateuser');

    Route::delete('/suppr-user/{id}', [UserController::class, 'destroy'])->name('suppruser');
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
