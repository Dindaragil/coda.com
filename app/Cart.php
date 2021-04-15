<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    public $incrementing = false;
    protected $primary_key = 'id';
    protected $fillable = [
        'id_user',
        'id_produk',
        'id_user',
        'qty'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function produk() {
        return $this->belongsTo('App\produk', 'id_produk', 'id');
    }

}
