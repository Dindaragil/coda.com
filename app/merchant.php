<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merchant extends Model
{
    protected $table = 'merchant';
    protected $fillable = ['nama', 'alamat', 'id_user'];
    protected $primary_key = 'id';
    public $incrementing = false;

    public function user () {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }



}
