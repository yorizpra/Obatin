<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{

    protected $table = 'StatusPembayaran';

    protected $fillable = [
        'nama_status',
    ];


}
