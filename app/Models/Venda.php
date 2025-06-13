<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $guarded = ['id'];

    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cliente ()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    
    public function produtos()
    {
        return $this->belongsToMany('App\Models\Produto');
    }

    public function parcelas ()
    {
        return $this->hasMany('App\Models\Parcela');
    }

}
