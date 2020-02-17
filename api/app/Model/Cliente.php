<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = "cliente";
    protected $fillable = ['nome', 'telefone', 'idade'];
    public $timestamps = true;

    public function vendas()
    {
        return $this->hasMany('App\Model\Venda');
    }
}
