<?php

namespace App\Http\Controllers;

use App\produk;
use App\transaksi;
use App\transaksi_produk;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $users = $request->user();
        $itemcart = DB::table('transaksi_produk')
        ->select('produk.id as id_produk', 'produk.nama as produk_nama', 'produk.harga', 'transaksi_produk.qty', 'transaksi_produk.subtotal', 'transaksi.id as id_transaksi', 'transaksi_produk.id as id_transaksi_produk', 'transaksi.total', 'transaksi_produk.subtotal')
        ->join('produk', 'produk.id', '=', 'transaksi_produk.id_produk')
        ->join('transaksi', 'transaksi.id', '=', 'transaksi_produk.id_transaksi')
        ->get();
        return view('cart.index', compact('itemcart'));

    }

    public function transaksi(Request $request, $id)
    {
        $produk = produk::where('id', $id)->first();

        $tgl = Carbon::now();

        //validasi jumlah pesanan
        if($request->qty > $produk->stok){
            return redirect('/detail/{id}')->with('status', 'The order exceeds the existing stock limit');
        }

        $cek_transaksi = transaksi::where('id_user', Auth::user()->id)->where('status', 0)->first();

        if(empty($cek_transaksi)){
            $transaksi = new transaksi;
            $transaksi->id_user = Auth::user()->id;
            $transaksi->tanggal = $tgl;
            $transaksi->status = 0;
            $transaksi->total = 0;
            $transaksi->save();
        }

        //detail
        $transaksi_baru = transaksi::where('id_user', Auth::user()->id)->where('status', 0)->first();

        //cek detail
        $cek_detail = transaksi_produk::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();

        if(empty($cek_detail)){
            $detail = new transaksi_produk;
            $detail->id_produk = $produk->id;
            $detail->id_transaksi = $transaksi_baru->id;
            $detail->qty = $request->qty;
            $detail->subtotal = $produk->harga * $request->qty;
            $detail->save();
        } else {
            $detail = transaksi_produk::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();
            $detail->qty = $detail->qty + $request->qty;
            $harga_detail_baru = $produk->harga * $request->qty;
            $detail->subtotal= $detail->subtotal + $harga_detail_baru;
            $detail->update();
        }

        //update transaksi
        $transaksi = transaksi::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $transaksi->total = $transaksi->total + $produk->harga * $request->qty;
        $transaksi->update();

        return redirect('/cart')->with('status', 'Item Berhasil ditambahkan ke keranjang');
    }

    public function konfirmasi()
    {
        $transaksi = transaksi::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $id_transaksi = $transaksi->id;
        $transaksi->status = 1;
        $transaksi->update();

        $detail = transaksi_produk::where('id_transaksi', $transaksi->id)->get();
        foreach($detail as $dt)
        {
            $produk = produk::where('id', $dt->id_produk)->first();
            $produk->stok = $produk->stok - $dt->qty;
            $produk->update();
        }

        return redirect('/checkout')->with('status', 'Pesanan berhasil dicheckout');
    }

    public function checkout() {
        $transaksi = transaksi::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $detail = [];
        if(!empty($transaksi))
        {
            $detail = transaksi_produk::where('id_transaksi', $transaksi->id)->get();
        }

        return view('cart.checkout', compact('transaksi', 'detail'));
    }

    public function delete($id)
    {
        $detail = transaksi_produk::where('id', $id)->first();
        $transaksi = transaksi::where('id', $detail->id_transaksi)->first();
        $transaksi->total = $transaksi->total - $detail->subtotal;
        $transaksi->update();
 
        $detail->delete();
        return redirect('/dashboard')->with('status', 'Pesanan berhasil dihapus!');
    }

    

    // public function tampil_transaksi($id)
    // {
    //     $data = DB::table('transaksi_produk')
    //                         ->join('transaksi', 'transaksi.id', '=', 'transaksi_produk.id_transaksi')
    //                         ->join('produk', 'produk.id', '=', 'transaksi_produk.id_produk')
    //                         ->where('id_transaksi', $id)
    //                         ->select('transaksi.id', 'transaksi.tanggal', 'produk.nama_produk', 'produk.harga',
    //                                 'transaksi_produk.qty', 'transaksi_produk.subtotal')
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
