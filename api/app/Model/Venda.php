<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public $table = "venda";
    protected $fillable = ['telefone', 'recarga', 'cliente_id'];
    public $timestamps = true;

    public function cliente()
    {
        return $this->belongsTo('App\Model\Cliente');
    }
}
