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

       $books->bookimg = $imageName ;
       $books->bookname = $request->bookname;
       $books->bookdesc = $request->bookdesc;

        $books->save();
        return back()->withSuccess("Book Listed Successfuly!!!!!!!!!");

    }

    public function edit($id)
    {
        $book = Books::where('id',$id)->first();

        return view('book.edit',['book'=>$book]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            "bookname"    => "required",
            "bookdesc"  => "required",
            "bookimg"  => "nullable|mimes:png,jpg",
        ]);
        $book = Books::where('id',$id)->first();

        if(isset($request ->bookimg))
        {
            $imageName = time().','.$request->bookimg->extension();
            $request->bookimg->move(public_path('bookimages'),$imageName);
            $book->bookimg = $imageName;
        }

        $book->bookname = $request->bookname;
        $book->bookdesc = $request->bookdesc;

        $book->save();
        return back()->withSuccess("Book Listed Updated!!!!!!!!!");


    }
    public function delete($id)
    {
        $book = Books::where('id', $id)->first();
        $book->delete();
        return redirect('/')->withSuccess("Book Listed Deleted!!!!!!!!!");
    }
}
