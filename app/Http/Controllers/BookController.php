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

    public function create(){
        //新規登録画面へ
        return view('books.create');
    }

    public function store(Request $request){

        // バリデーション
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'genre' => ['nullable', 'string', 'max:255'],
            'memo' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'], //画像は最大2MB
        ]);

        //画像のアップロード
        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('books', 'public');
        }


        // DB保存
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'memo' => $request->memo,
            'image_path' => $imagePath,
            'is_read' => $request->has('is_read'),
        ]);

        // リダイレクト
        return redirect()->route('books.index')->with('success', '登録が完了しました');
    }
}
