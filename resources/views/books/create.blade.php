@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="flex justify-center items-center ">
        <form action="{{ route('books.store') }}" method="POST" class="w-1/2 p-8 bg-gray-100 rounded-lg mt-60 ml-64"
            enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl mb-4">Créer un nouveau book</h2>
            <div class="mb-4">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du
                    book</label>
                <input type="text" value="{{ old('title') }}" name="title" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du
                    author</label>
                <input type="text" value="{{ old('author') }}" name="author" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description</label>
                <input type="text" value="{{ old('description') }}" name="description" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    published_date</label>
                <input type="date" value="{{ old('published_date') }}" name="published_date" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover</label>
                <input type="file" value="{{ old('cover_image') }}" name="cover_image" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
        </form>
    </div>



@endsection
