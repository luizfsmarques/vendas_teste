<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $guarded = ['id'];

    public function vendas()
    {
        return $this->belongsToMany('App\Models\Vendas');
    }
}
