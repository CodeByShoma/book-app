<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book; //Bookモデル

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel入門',
            'author' => '掌田津 耶乃',
            'memo' => 'Laravel7対応の入門書',
            'genre' => '技術書',
            'image_path' => 'books/laravel.jpg',
        ]);

        Book::create([
            'title' => '孫子の兵法',
            'author' => '守屋 淳',
            'memo' => '孫正義やビルゲイツや黒田官兵衛も読んだ書籍',
            'genre' => '古典文学',
            'image_path' => 'books/sonshi.jpg',
        ]);

        Book::create([
            'title' => 'ワンピース 1巻',
            'author' => '尾田 栄一郎',
            'memo' => 'ルフィの物語の始まり',
            'genre' => 'コミック',
            'image_path' => 'books/onepiece.jpg',
        ]);

        Book::create([
            'title' => '呪術廻戦 20巻',
            'author' => '芥見 下々',
            'memo' => '宿儺が登場する巻',
            'genre' => 'コミック',
        ]);

        Book::create([
            'title' => '推しの子 一巻',
            'author' => '赤坂 アカ',
            'memo' => '大人気のアイドル漫画',
            'genre' => 'コミック',
            'image_path' => 'books/oshi.jpg',
        ]);

        Book::create([
            'title' => '僕のヒーローアカデミア 一巻',
            'author' => '堀越 耕平',
            'memo' => 'これはある少年がヒーローになるまでの物語',
            'genre' => 'コミック',
            'image_path' => 'books/hero.jpg',
        ]);

    }
}
