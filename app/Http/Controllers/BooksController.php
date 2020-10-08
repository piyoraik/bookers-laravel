<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        $user = Auth::user();
        return view('books.index', compact('books', 'user'));
    }

    public function create(Request $request)
    {
        $book = Book::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect(route('books.show', ['id' => $book->id]));
    }

    public function show(int $id)
    {
        $book = Book::find($id);
        $user = $book->user;
        return view('books.show', compact('book', 'user'));
    }

    public function edit(int $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(int $id, Request $request)
    {
        $book = Book::find($id)->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);
        return redirect(route('books.show', ['id' => $id]));
    }

    public function delete(int $id)
    {
        $book = Book::find($id)->delete();
        return redirect('/books');
    }
}
