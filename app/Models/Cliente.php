<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = ['id'];

    public function vendas ()
    {
        return $this->hasMany('App\Models\Venda');
    }

}
