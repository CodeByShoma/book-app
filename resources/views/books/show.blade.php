<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細情報
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                                {{-- 表紙画像 --}}
                                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src={{ $book->image_path ? asset('storage/' . $book->image_path) : asset('images/no_image.png')}}>
                                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    {{-- 本の名前 --}}
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book -> title}}</h1>
                                    <div class="flex items-center space-x-5">
                                        {{-- 著者名 --}}
                                        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $book -> author}}</h2>
                                        {{-- ジャンル --}}
                                        <h2 class="text-xs title-font text-white bg-green-400 font-bold py-2 px-4 rounded-3xl tracking-widest">{{ $book -> genre}}</h2>
                                        {{-- 読了済み --}}
                                        @if ($book->is_read) {{-- もしimage_path（画像）が空だったら --}}
                                            <h2 class="text-xs title-font text-white bg-red-500 font-bold py-2 px-4 rounded-3xl tracking-widest">読了済み</h2>
                                        @endif
                                    </div>
                                    {{-- メモ --}}
                                    <div>
                                        <p class="leading-relaxed mt-5">{{ $book -> memo}}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- ボタン --}}
                            <div class="flex justify-end mt-5 space-x-5 lg:w-4/5 mx-auto">
                                {{-- 編集ボタン --}}
                                <button type="submit" class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集</button>
                                {{-- 戻るボタン --}}
                                <button type="button" onclick="location.href='{{ route('books.index') }}'" class=" text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">戻る</button>
                                {{-- 削除ボタン --}}
                                <form method="post" action="{{ route('books.destroy', ['id' => $book->id]) }}" onsubmit="return confirm('本当に削除してもよろしいですか？')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class=" text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除</button>
                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
