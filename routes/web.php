<?php

use App\Http\Controllers\InstaAppController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('instapp', InstaAppController::class);
Route::get('/dashboard', [InstaAppController::class, 'index'])->name('dashboard');

// Route::resource('instapp/{id}', [CommentController::class])->name('comment');

// Route::resource('comments', CommentController::class);
Route::resource('instapp/{id}/comments', CommentController::class);
// Route::post('/dashboard', [LikeController::class, 'store'])->name('like.store');

// Route::post('like', [LikeController::class, 'store'])->name('like.store');

// Route::get('/post-list',[PostController::class,'postList'])->name('post.list');
// Route::post('/like-post/{id}',[InstaAppController::class,'likePost'])->name('like.post');
// Route::post('/unlike-post/{id}',[InstaAppController::class,'unlikePost'])->name('unlike.post');

// Route::middleware('auth')->group(function () {
//     Route::post('like', [LikeControllerlike::class, 'like'])->name('like');
//     Route::delete('like', [LikeController::class, 'unlike'])->name('unlike');
// });

require __DIR__.'/auth.php';

