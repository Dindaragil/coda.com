<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merchant extends Model
{
    protected $table = 'merchant';
    protected $fillable = ['nama', 'alamat'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


}
