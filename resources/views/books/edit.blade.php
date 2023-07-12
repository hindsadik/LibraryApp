@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="flex justify-center items-center h-screen ml-32">
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="w-1/2 p-8 bg-gray-100 rounded-lg ml-64"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h2 class="text-2xl mb-4">Créer un nouveau Blog</h2>
            <div class="mb-4 ">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiltle</label>
                <input type="text" name="title" value="{{ $book->title }}" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                <input type="text" name="author" value="{{ $book->author }}" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input type="text" name="description" value="{{ $book->description }}" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published_date</label>
                <input type="text" name="published_date" value="{{ $book->published_date }}" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label for="small-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover_Image</label>
                <input type="file" value="{{ old('cover_image') }}" name="cover_image" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @error('cover_image')
                    is-invalid
                @enderror>
                @error('cover_image')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror

                @error('title')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                @error('author')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                @error('description')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                @error('published_date')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <button
                class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">Enregistrer</button>
        </form>
    </div>
@endsection
