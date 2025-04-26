<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//一覧表示
Route::get('/books', [BookController::class, 'index'])->middleware(['auth'])->name('books.index');

//新規登録
Route::get('/books/create', [BookController::class, 'create'])->middleware(['auth'])->name('books.create');

//登録処理
Route::post('/books', [BookController::class, 'store'])->middleware(['auth'])->name('books.store');

//編集表示
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->middleware(['auth'])->name('books.edit');

//更新処理
Route::put('/books/{id}', [BookController::class, 'update'])->middleware(['auth'])->name('books.update');

//詳細表示
Route::get('/books/{id}', [BookController::class, 'show'])->middleware(['auth'])->name('books.show');

//削除処理
Route::delete('/books/{id}', [BookController::class, 'destroy'])->middleware(['auth'])->name('books.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
