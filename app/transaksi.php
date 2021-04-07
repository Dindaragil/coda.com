<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    public $incrementing = false;
    protected $primary_key = 'id';

}
