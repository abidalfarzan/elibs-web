<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class HallController extends Controller
{
    //
    public function index(){
        $title = "hall";
        $books = Book::with(['author', 'category'])->paginate(10);

        // return dd($books);

        return view('hall', compact('title', 'books'));
    }

    public function singleBook(Book $book) {
        $title = $book->name;
        return dd($book);
    }
    public function singleAuthor(Author $author) {
        $title = 'Books of' . $author->name;
        $books = Book::where('author_id', $author->id)->with(['author', 'category'])->paginate(10);
        return view('hall', compact('books', 'title'));
    }
    public function singleCategory(Category $category) {
        $title = 'Books of' . $category->name;
        $books = Book::where('category_id', $category->id)->with(['author', 'category'])->paginate(10);
        return view('hall', compact('books', 'title'));
    }
}
