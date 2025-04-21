<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index(){

        $books = Book::select('title', 'genre', 'image_path')->get(); //必要な情報だけ取得する

        return view('books.index', compact('books')); //ビューを表示して値を渡す
    }
}
