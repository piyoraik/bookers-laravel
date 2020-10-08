<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/books', [BooksController::class, 'index'])->name('books.index');

Auth::routes();

Route::post('/books', [BooksController::class, 'create'])->name('books.create');

Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');

Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');

Route::post('/books/{id}', [BooksController::class, 'update'])->name('books.update');

Route::post('/books/{id}/delete', [BooksController::class, 'delete'])->name('books.delete');
