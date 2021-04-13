<?php

namespace App\Http\Controllers;

use App\produk;
use App\transaksi;
use App\transaksi_produk;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index(Request $request)
    {
        $users = $request->user();
        $itemcart = transaksi::where('id_user', $users->id)
                             ->where('status', 'cart')
                             ->first();
        $data = array('title' => 'Shopping Cart',
                    'itemcart' => $itemcart);
        return view('cart.index', $data)->with('no', 1);
    }

    // public function transaksi(Request $request, $id)
    // {
    //     $produk = produk::where('id', $id)->first();

    //     $tgl = Carbon::now();

    //     if($request->kuantitas > $produk->stok){
    //         return redirect('cart'.$id);
    //     }

    //     $cek = transaksi::where('id_user', Session::get('id'))->first();

    //     if(empty($cek)){
    //         $transaksi = new transaksi;
    //         $transaksi->id_user = Session::get('id');
    //         $transaksi->tanggal = $tgl;
    //         $transaksi->total = 0;
    //         $transaksi->save();
    //     }
    //     $transaksi_baru = transaksi::where('id_user', Session::get('id'))->first();
    //     $cek_detail = transaksi_produk::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();

    //     if(empty($cek_detail)){
    //         $detail = new transaksi_produk;
    //         $detail->id_produk = $produk->id;
    //         $detail->id_transaksi = $transaksi_baru->id;
    //         $detail->kuantitas = $request->kuantitas;
    //         $detail->subtotal = $produk->harga*$request->kuantitas;
    //         $detail->save();
    //     } else {
    //         $detail = transaksi_produk::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();
    //         $detail->kuantitas = $detail->kuantitas + $request->kuantitas;
    //         $harga_detail_baru = $produk->harga * $request->kuantitas;
    //         $detail->subtotal= $detail->subtotal + $harga_detail_baru;
    //         $detail->update();
    //     }

    //     $transaksi = transaksi::where('id_user', Session::get('id'))->first();
    //     $transaksi->total = $transaksi->total+$produk->harga*$request->kuantitas;
    //     $transaksi->update();

    //     return redirect('client.cart')->with('status', 'Item Berhasil ditambahkan ke keranjang');
    // }

    // public function tampil_transaksi($id)
    // {
    //     $data = DB::table('transaksi_produk')
    //                         ->join('transaksi', 'transaksi.id', '=', 'transaksi_produk.id_transaksi')
    //                         ->join('produk', 'produk.id', '=', 'transaksi_produk.id_produk')
    //                         ->where('id_transaksi', $id)
    //                         ->select('transaksi.id', 'transaksi.tanggal', 'produk.nama_produk', 'produk.harga',
    //                                 'transaksi_produk.kuantitas', 'transaksi_produk.subtotal')
    //                         ->simplepaginate(4);
    //     // $data = Transaksi::where('id', $id)->first();
    //     return view('client.checkout', compact('data'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function kosongkan($id) {
        $itemcart = transaksi::findOrFail($id);
        $itemcart->detail()->delete();
        $itemcart->updatetotal($itemcart, '-'.$itemcart->subtotal);
        return back()->with('success', 'Cart successfully emptied' );
    }
}
