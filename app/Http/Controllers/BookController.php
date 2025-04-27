<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

use function PHPUnit\Framework\returnSelf;

class BookController extends Controller
{

    public function index(){

        $books = Book::select('id', 'title', 'genre', 'image_path')->get(); //必要な情報だけ取得する

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

    public function show(string $id){

        // データを取得
        $book = Book::findOrFail($id);

        //詳細ページへ
        return view('books.show', compact('book'));

    }

    public function edit(string $id){

        // データを取得
        $book = Book::findOrFail($id);

        //編集ページへ
        return view('books.edit', compact('book'));

    }

    public function update(Request $request, string $id){
        // バリデーション
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'genre' => ['nullable', 'string', 'max:255'],
            'memo' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'], //画像は最大2MB
        ]);

        //本のデータを取得
        $book = Book::findOrFail($id);

        //画像のアップロード
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('books','public');
            $book->image_path = $imagePath;
        }

        //フォームの値を更新
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->memo = $request->memo;
        //is_readが存在していたらtrueを存在していなかったらfalseになる
        $book->is_read = $request->has('is_read');

        //保存
        $book->save();

        //トップページへリダイレクト
        return redirect()->route('books.index')->with('success', '更新が完了しました');

    }

    public function destroy(string $id){
        //指定されたIDのタスクを取得（なければ404）
        $book = Book::findOrFail($id);

        //取得したデータを削除
        $book -> delete();

        return redirect()->route('books.index')->with('success', '削除が完了しました');
    }

    public function completed(){
        $books = Book::where('is_read', true)->get();

        return view('books.completed', compact('books'));
    }
}
