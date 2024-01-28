<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
    return view('welcome', compact('posts'));
});

Route::resource('posts', PostController::class);

Route::resource('comments', CommentController::class);
Route::post('/comments/{postId}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
