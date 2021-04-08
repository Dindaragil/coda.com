<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\merchant;
use App\kategori;
use App\produk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')
                  ->select('produk.id', 'produk.nama as produk_nama', 'produk.deskripsi', 'produk.stok', 'produk.harga', 'produk.gambar', 'merchant.nama as merchant_nama', 'kategori.nama as kategori_nama')
                  ->join('kategori', 'kategori.id', '=', 'produk.id_kategori')
                  ->join('merchant', 'merchant.id', '=', 'produk.id_merchant')
                  ->get();

        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $produk = produk::where('id', $id)->get();
        return view('produk.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_merchant' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $gambar = rand().$request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(base_path("./public/Assets"), $gambar);

        $produk = produk::create($request->all());
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->id_kategori = $request->id_kategori;
        $produk->id_merchant = $request->id_merchant;
        $produk->save();
        return redirect('/produk')->with('status', 'Successfully create a new product!');
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
        $produk = produk::where('id', $id)->get();
        return view('produk.edit', compact('produk'));
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $gambar = rand().$request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(base_path("./public/Assets"), $gambar);

        $produk = produk::create($request->all());
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;

        $produk->save();
        return redirect('/produk')->with('status', 'Successfully create a new product!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::where('id', $id)->first();

        if($produk != null){
            $produk->delete();

            return redirect('/produk')->with('status', 'Successfully deleted the category!');
        }
        return redirect('/produk')->with('status', 'ID Not Found!');
    }

}
