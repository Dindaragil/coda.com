<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_produk;
use App\produk;
use Carbon\Carbon;
use App\transaksi;

class Transaksi_ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return abort('404');
    }

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
        // $this->validate($request, [
        //     'id_produk' => 'required',
        // ]);
        // $users = $request->user();
        // $produk = produk::findOrFail($request->id_produk);

        // $cart = transaksi::where('id_user', $users->id)
        //                  ->where('status', 'cart')
        //                  ->first();

        // if($cart) {
        //     $itemcart = $cart;
        // } else {
        //     $no_invoice = transaksi::where('id_user', $users->id)->count();
        //     $inputancart['id_user'] = $users->id;
        //     $inputancart['no_invoice'] = 'INV '.str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
        //     $inputancart['tanggal'] = Carbon::now();
        //     $inputancart['status'] = 'cart';
        //     $itemcart = transaksi::create($inputancart);
        // }

        // $cekdetail = transaksi_produk::where('id_transaksi', $itemcart->id)
        //                             ->where('id_produk', $produk->id)
        //                             ->first();

        // $qty = 1;
        // $harga = $produk->harga;
        // $subtotal = $qty * $harga;
        // if($cekdetail) {
        //     $cekdetail->updatedetail($cekdetail, $qty, $harga);
        //     $cekdetail->cart->updatetotal($cekdetail->cart, $subtotal);
        // } else {
        //     $inputan = $request->all();
        //     $inputan['id_transaksi'] = $itemcart->id;
        //     $inputan['id_produk'] = $produk->id;
        //     $inputan['qty'] = $qty;
        //     $inputan['harga'] = $harga;
        //     $inputan['subtotal'] = $harga*$qty;
        //     $detail = transaksi_produk::create($inputan);
        //     $detail->cart->updatetotal($detail->cart, $subtotal);
        // }


        // return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke cart');

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
        $detail = transaksi_produk::findOrFail($id);
        $param = $request->param;

        if($param == 'tambah') {
            $qty = 1;
            $detail->updatedetail($detail, $qty, $detail->harga);
            $detail->updatetotal($detail->cart, $detail->harga);
            return back()->with('success', 'Item berhasil diupdate');

        }
        if($param == 'kurang') {
            $qty = 1;
            $detail->updatedetail($detail, '-'.$qty, $detail->harga);
            $detail->cart->updatetotal($detail->cart, '-'.$detail->harga);
            return back()-with('success', 'item berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $detail = transaksi_produk::findOrFail($id);
        // $detail->cart->updatetotal($detail->cart, '-'.$detail->subtotal);
        // if($detail->delete()){
        //     return back()->with('success', 'item berhasil dihapus');

        // } else {
        //     return back()->with('error', 'item gagal dihapus');
        // }
    }
}
