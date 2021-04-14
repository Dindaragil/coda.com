<?php

namespace App\Http\Controllers;
use App\kategori;
use Illuminate\Support\Facades\Session;
// use Illuminate\Validation\Validator;
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
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $kategori = new kategori();
        $kategori->nama = $request->nama;
        $simpan = $kategori->save();

        if($simpan){
            Session::flash('success', 'Successfully add a new category!');
            return redirect('/user');
        } else {
            Session::flash('errors', ['' => 'Failed to add a new category! Please try again later!']);
            return redirect('/user_create');
        }
        // kategori::create($request->all());
        // return redirect('/kategori')->with('status', 'Successfully add a new category!');

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
        $simpan = $kategori->save();

        if($simpan){
            Session::flash('success', 'Successfully updated a user!');
            return redirect('/user');
        } else {
            Session::flash('errors', ['' => 'Update failed! Please try again later!']);
            return redirect('/user_edit/{id}');
        }

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
