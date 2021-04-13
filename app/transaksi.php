<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    public $incrementing = false;
    protected $primary_key = 'id';
    protected $fillable = [
        'id_user',
        'no_invoice',
        'tanggal',
        'status',
        'subtotal',
        'total'

    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function detail() {
        return $this->hasMany('App\transaksi_produk', 'id_transaksi');
    }

    public function updatetotal($itemcart, $subtotal) {
        $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        $this->attributes['total'] = $itemcart->total + $subtotal;
        self::save();
    }
}
