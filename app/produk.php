<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['nama', 'deskripsi', 'stok', 'harga', 'gambar', 'id_merchant', 'id_kategori'];
    public $incrementing = false;
    protected $primary_key = 'id';

    public function merchant () {
        return $this->belongsTo('App\merchant', 'id_merchant', 'id');
    }

    public function kategori () {
        return $this->belongsTo('App\merchant', 'id_kategori', 'id');
    }

}
