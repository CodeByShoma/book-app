<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            本棚
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- コンテンツ --}}
                    <section class="text-gray-600 body-font">
                        {{-- フラッシュメッセージ --}}
                        @if (session('success'))
                            <div class="bg-blue-400 text-white p-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="container px-5 py-24 mx-auto">
                            {{-- 新規登録ボタン --}}
                            <div class="flex pl-4 mt-4 lg:w-4/5 w-full mx-auto mb-10">
                                <button onclick="location.href='{{ route('books.create') }}'" class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">本を登録</button>
                            </div>

                            <div class="flex flex-wrap -m-4">
                                @foreach ($books as $book)
                                    {{-- アイテム --}}
                                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                        {{-- 画像 --}}
                                        <a class="block relative w-48 h-72 object-cover rounded overflow-hidden">
                                            <img src="{{ $book->image_path ? asset('storage/' . $book->image_path) : asset('images/no_image.png')}}" class="object-cover object-center w-full h-full block" alt="book image" >
                                        </a>

                                        <div class="mt-4">
                                            {{-- カテゴリ --}}
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $book->genre }}</h3>
                                            {{-- タイトル --}}
                                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $book->title }}</h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    {{-- ボタン --}}
                    <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                        <button class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Button</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

