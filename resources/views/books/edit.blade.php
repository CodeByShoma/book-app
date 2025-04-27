<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                {{-- バリデーションの表示 --}}
                                @if($errors -> any())
                                    @foreach ($errors->all() as $error)
                                        <ul class="">
                                            <li class="text-red-500">・{{ $error }}</li>
                                        </ul>
                                    @endforeach
                                @endif

                                {{-- フォーム --}}
                                <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data" class="flex flex-wrap -m-2 mt-10">
                                    @csrf
                                    @method('PUT')
                                    {{-- タイトル --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="title" class="leading-7 text-sm text-gray-600">本のタイトル</label>
                                            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    {{-- 著者名 --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="author" class="leading-7 text-sm text-gray-600">著者名</label>
                                            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    {{-- ジャンル --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="genre" class="leading-7 text-sm text-gray-600">ジャンル</label>
                                            <input type="text" id="genre" name="genre" value="{{ old('genre', $book->genre) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    {{-- メモ --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                            <textarea id="memo" name="memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('memo', $book->memo) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- 表紙画像 --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="image" class="text-sm text-gray-600">表紙画像</label>
                                            @if ($book->image_path)
                                                <div class="mb-4">
                                                    <img src="{{ asset('storage/' . $book->image_path) }}" alt="現在の表示画像" class="w-40 h-60 object-cover">
                                                </div>
                                            @endif
                                            <input type="file" id="image" name="image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    {{-- 読了済み --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="inline-flex items-center mt-3">
                                                <input type="checkbox" name="is_read" value="1" {{ old('is_read', $book->is_read) ? 'checked': '' }} class="form-checkbox h-5 w-5 text-green-600">
                                                <span class="ml-2 text-gray-600">読了済み</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="p-2 w-full flex">
                                        <button type="button" onclick="location.href='{{ route('books.index') }}'" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">戻る</button>
                                        <button type="submit" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
