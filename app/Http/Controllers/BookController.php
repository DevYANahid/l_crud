<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Books;

class BookController extends Controller
{
    public function index ()
    {
        $books = Books::get();
        return view('book.index',['books'=> $books]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)

    

    {

        $request->validate([
            "bookname"    => "required",
            "bookdesc"  => "required",
            "bookimg"  => "required|mimes:png,jpg",
        ]);
        
        $imageName = time().','.$request->bookimg->extension();
        $request->bookimg->move(public_path('bookimages'),$imageName);

        
        $books = new Books;

        $books->bookimg = $imageName;
        $books->bookname = $request->bookname;
        $books->bookdesc = $request->bookdesc;

        $books->save();
        return back()->withSuccess("Book Listed Successfuly!!!!!!!!!");

    }
}
