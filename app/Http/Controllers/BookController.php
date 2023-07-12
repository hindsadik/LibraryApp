<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('books.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'description'=> 'required|min:10|max:255',
            'published_date' => 'required|date',
            'cover_image' => 'mimes:png,jpg,webp|max:4096',
        ]);
        
        
        $books = new Book();
        $books->title = $validatedData['title'];
        $books->author = $validatedData['author'];
        $books->description = $validatedData['description'];
        $books->published_date  = $validatedData['published_date'];

        
        if ($request->hasFile('cover_image')) {
            $books->cover_image = $request->file('cover_image')->store('images/books');
        }
     
        $books->save();
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'description'=> 'required|min:10|max:255',
            'published_date' => 'required|date',
            'cover_image' => 'mimes:png,jpg,webp|max:4096',
        ]);

        $books = Book::findOrFail($id);
        $books->title = $validatedData['title'];
        $books->author = $validatedData['author'];
        $books->description = $validatedData['description'];
        $books->published_date  = $validatedData['published_date'];

        if ($request->hasFile('cover_image')) {
            // Delete previous cover image if it exists
            if ($books->cover_image) {
                Storage::delete($books->cover_image);
            }

            $books->cover_image = $request->file('cover_image')->store('images/books');
        }

        $books->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
