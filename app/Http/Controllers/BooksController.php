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

    public function show(Request $request)
    {
        $book = Book::find($request->id);
        $user = $book->user;
        return view('books.show', compact('book', 'user'));
    }

    public function edit(Request $request)
    {
        $book = Book::find($request->id);
        $user = $book->user;
        if ($user->id != Auth::id()) {
            return view('books.show', compact('book', 'user'));
        }
        return view('books.edit', compact('book'));
    }

    public function update(Request $request)
    {
        $book = Book::find($request->id)->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);
        return redirect(route('books.show', ['id' => $request->id]));
    }

    public function delete(int $id)
    {
        $book = Book::find($id)->delete();
        return redirect('/books');
    }
}
