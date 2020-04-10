<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accessno;
use App\Book;
use App\Category;

class AccessnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('access_nos.create');
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
            'access_no'=>'required'
        ]);
        $cat = $request->get('name');
        $accessCat = Category::where('name', $cat)->first();
        $booktitle = $request->get('title');
        $accessTitle = Book::where('title', $booktitle)->first();
        $ed = $request->get('edition');
        $accessEd = Book::where('edition', $ed)->first();

        $accessno = new Accessno;
        $accessno->access_no = $request->input('access_no');
        $accessno->category_id = $accessCat->id;
        if($accessTitle->id == $accessEd->id){
            $accessno->book_id = $accessTitle->id;
        }
        else{
            return redirect('/books')->with('error','Invalid Information');
        }

        $accessno->save(); 

        return redirect('/books')->with('success','Successfully Added New Access No.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accessno = Accessno::find($id);
        
        return view('access_nos.edit')->with('accessno', $accessno);
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
            'access_no'=>'required'
        ]);
        $cat = $request->get('name');
        $accessCat = Category::where('name', $cat)->first();
        $booktitle = $request->get('title');
        $accessTitle = Book::where('title', $booktitle)->first();
        $ed = $request->get('edition');
        $accessEd = Book::where('edition', $ed)->first();

        $accessno = Accessno::find($id);
        $accessno->access_no = $request->input('access_no');
        $accessno->category_id = $accessCat->id;
        if($accessTitle->id == $accessEd->id){
            $accessno->book_id = $accessTitle->id;
        }
        else{
            return redirect('/books')->with('error','Invalid Information');
        }

        $accessno->save(); 

        return redirect('/books')->with('success','Successfully Updated Access No.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessno = Accessno::find($id);
        $accessno->delete();

        return redirect('/books')->with('success','Access No Removed');
    }
}
