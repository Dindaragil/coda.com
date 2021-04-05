<?php

namespace App\Http\Controllers;
use App\kategori;
use Validator;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori  = kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        kategori::create($request->all());
        return redirect('/kategori')->with('status', 'Never Gonna Give You Up, Never Gonna Let You Down');

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = kategori::where('id',$id)->get();
        // return response ($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::where('id', $id)->get();
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $kategori = kategori::where('id', $id)->first();
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('status', 'Successfully change the category');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::where('id', $id)->first();

        if($kategori != null){
            $kategori->delete();

            return redirect('/kategori')->with('status', 'Successfully deleted the category!');
        }
        return redirect('/kategori')->with('status', 'ID Not Found!');

    }
}
