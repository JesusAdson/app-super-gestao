<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe'); // produto tem um produto detalhe
        // o orm vai buscar 1 registro em produto_detalhes com base na fk 
    }
}
