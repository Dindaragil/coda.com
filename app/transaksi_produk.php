<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_produk extends Model
{
    protected $table = 'transaksi_produk';
    public $incrementing = false;
    protected $primary_key = 'id';
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'qty',
        'subtotal'
    ];

    public function transaksi() {
        return $this->belongsTo('App\transaksi', 'id_transaksi', 'id');
    }

    public function produk() {
        return $this->belongsTo('App\produk', 'id_produk', 'id');
    }



}
