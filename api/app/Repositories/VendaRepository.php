<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use App\Model\Venda;
//use Your Model

/**
 * Class VendaRepository.
 */
class VendaRepository 
{
    

    public function paginate() {
        return Venda::paginate(5);
    }

    public function find($id) {
        return Venda::find($id);
    }

    public function update($data) {
        $venda = new Venda;
        $venda->update($data);
        return $venda;
    }
}
