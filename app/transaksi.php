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
        'tanggal',
        'status',
        'total'

    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function transaksi_produk() {
        return $this->hasMany('App\transaksi_produk', 'id_transaksi', 'id');
    }

    public function updatetotal($detail, $subtotal) 
    {
        $this->attributes['subtotal'] = $detail->subtotal + $subtotal;
        $this->attributes['total'] = $detail->total + $subtotal;
        self::save();
    }

    
}
