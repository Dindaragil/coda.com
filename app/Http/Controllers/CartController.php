<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Cart;
use App\produk;
use App\User;

class CartController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::where('id', Auth::user()->id);
        $itemcart = DB::table('cart')
        ->select('produk.id', 'produk.nama as produk_nama', 'produk.harga', 'cart.qty')
        ->join('produk', 'produk.id', '=', 'cart.id_produk')
        ->get();
        return view('cart.index', compact('itemcart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $produk = produk::where('id', $id)->first();
        if($request->qty > $produk->stok)
        {
            return redirect('detail/'.$id)->with('status', 'The order exceeds the existing stock limit');
        }
      
       $itemcart = Cart::create($request->all());
       $itemcart-> id_user = $request->id_user;
       $itemcart-> id_produk = $request->id_produk;
       $itemcart-> qty = $request->qty;
       $itemcart->save();
    //    echo($itemcart);
       return redirect('/cart')->with('status', 'Successfully create a new product!');


      
    //    if($simpan){
    //     Session::flash('success', 'Successfully add to cart');
    //     return redirect('/cart');
    // } else {
    //     Session::flash('errors', ['' => 'Add to cart failed! Please try again later!']);
    //     return redirect('/detail/{id}');
    // }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kosongkan($id){
        $itemcart = Cart::findOrFail($id);
        $itemcart->detail()->delete();
        return back()->with('success', 'Cart berhasil dikosongkan');
    }
}
