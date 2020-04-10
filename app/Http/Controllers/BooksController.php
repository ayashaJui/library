<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Accessno;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title','asc')->paginate(15);

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('books.create');
    }

    public function searchBook(Request $request)
    {
        $search = $request->get('search');
        $books = Book::where('title', 'LIKE', "%$search%")->paginate(5);

        return view('books.search', ['books'=> $books, 'search'=> $search]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author_name' => 'required'
        ]);
        $catname = $request->get('name');
        $bookcategory = Category::where('name',$catname)->first();

        $book = new Book;
        $book->title = $request->input('title');
        $book->author_name = $request->input('author_name');
        $book->category_id = $bookcategory->id;
        $book->publisher = $request->input('publisher');
        $book->edition = $request->input('edition');

        $book->save(); 

        return redirect('/books')->with('success','New Book Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookAccessno = Accessno::where('book_id', $id)->paginate(10);
        $book = Book::find($id);

        return view('books.show', ['bookAccessno'=> $bookAccessno, 'book'=> $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        
        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'author_name' => 'required'
        ]);
        $catname = $request->get('name');
        $bookcategory = Category::where('name',$catname)->first();

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author_name = $request->input('author_name');
        $book->category_id = $bookcategory->id;
        $book->publisher = $request->input('publisher');
        $book->edition = $request->input('edition');

        $book->save();

        return redirect('/books')->with('success','Book Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('success','Book Removed');
    }
}
