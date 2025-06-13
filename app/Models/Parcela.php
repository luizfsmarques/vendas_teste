<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $guarded = ['id'];

    public function venda ()
    {
        return $this->belongsTo('App\Models\Venda');
    }
    
}
