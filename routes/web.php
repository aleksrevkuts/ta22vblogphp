<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');
Route::get('/tag/{tag}', [PublicController::class, 'tag'])->name('tag');
Route::get('/comment/{comment}', [PublicController::class, 'comment'])->name('comment');

// Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/admin/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/admin/posts', PostController::class);
    Route::resource('/admin/comments', CommentController::class);
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/tags', TagController::class);


    Route::post('/post/{post}/like', [PublicController::class, 'like'])->name('like');
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
