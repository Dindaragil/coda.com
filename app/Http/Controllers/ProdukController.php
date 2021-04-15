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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $produk = merchant::where('id', $id)->get();
        $kategori = kategori::all();
        return view('produk.create',compact('produk', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->gambar);
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'id_kategori' => 'required',
            'id_merchant' => 'required',
            'gambar' => 'mimes:jpeg, jpg, png, svg'
        ];
        $messages = [
            'nama.required' => 'Name is required',
            'deskripsi.required' => 'Description is required',
            'stok.required' => 'Stock is required',
            'stok.integer' => 'Stock must be filled with number',
            'harga.required' => 'Price is required',
            'harga.integer' => 'Price must be filled with number',
            'id_kategori.required' => 'Category is required',
            'id_merchant.required' => 'required',
            'gambar.mimes' => 'Sorry, the file format is not capable.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }


        if($request->gambar) {
            $foto = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();
           $request->gambar->move(public_path('image'), $foto);
        } else {
            $foto = null;
        }
        produk::create([
            'id_merchant' => $request->id_merchant,
            'id_kategori' => $request->id_kategori,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $foto
        ]);
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
        $merchant = merchant::where('id', $id)->get();
        $kategori = kategori::all();
        return view('produk.edit',compact('produk', 'merchant', 'kategori'));
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
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'id_kategori' => 'required',
            'id_merchant' => 'required',
            'gambar' => 'mimes: png, jpeg, jpg, svg'
        ];
        $messages = [
            'nama.required' => 'Name is required',
            'deskripsi.required' => 'Description is required',
            'stok.required' => 'Stock is required',
            'stok.integer' => 'Stock must be filled with number',
            'harga.required' => 'Price is required',
            'harga.integer' => 'Price must be filled with number',
            'id_kategori.required' => 'Category is required',
            'id_merchant.required' => 'required',
            'gambar.mimes' => 'Sorry, the file format is not capable.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }


        $produk = produk::find($id);

        if($request->gambar) {
            $foto = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();
           $request->gambar->move(public_path('image'), $foto);
        } else {
            $foto = $produk->gambar;
        }


        $produk->update([
           'id_merchant' => $request->id_merchant,
           'id_kategori' => $request->id_kategori,
           'nama' => $request->nama,
           'deskripsi' => $request->deskripsi,
           'stok' => $request->stok,
           'harga' => $request->harga,
           'gambar' => $foto
       ]);
       return redirect('/produk')->with('status', 'Successfully updated the product!');


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

            return redirect('/produk')->with('status', 'Successfully deleted the product!');
        }
        return redirect('/produk')->with('status', 'ID Not Found!');
    }

}
