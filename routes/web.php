<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;




Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

// authentication

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

//admin

Route::middleware('can:admin')->group(function () {
  Route::resource('admin/posts' , AdminPostcontroller::class)->except('show');
  // Route::get('admin/posts/create', [AdminPostcontroller::class, 'create']);
  // Route::post('admin/posts', [AdminPostcontroller::class, 'store']);
  // Route::get('admin/posts', [AdminPostcontroller::class, 'index']);
  // Route::get('admin/posts/{post}/edit', [AdminPostcontroller::class, 'edit']);
  // Route::patch('admin/posts/{post}', [AdminPostcontroller::class, 'update']);
  // Route::delete('admin/posts/{post}', [AdminPostcontroller::class, 'destroy']);
});
