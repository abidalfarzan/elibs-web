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
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'of' . $category->name;
        }

        if (request('author')) {
            $author = Author::firstWhere('slug', request('author'));
            $title = 'of' . $author->name;
        }

        // if (request('search')) {
        //     $books = Book::where('name', 'like', '%' . request('search') . '%')->with(['author', 'category']);
        // }

        $title="Hall of" . $title;
        $books = Book::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString();

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
