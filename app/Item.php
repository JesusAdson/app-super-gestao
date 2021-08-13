<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); // produto tem um produto detalhe
        // o orm vai buscar 1 registro em produto_detalhes com base na fk 
        // quando se trata de nomes de models não padronizados
        // tem-se q colocar mais dois parâmetros na função
        // nome da fk e o nome da pk 'App\Model', <nomeFK>, <nomePK>
        // MODEL Item, que mapeia a tabela produtos
        // tem um itemDetalhe q mapeia a tabela produtoDetalhe
    }

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
        /*
            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
            4 - Representa o nome da Fk da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
        */
    }   
}
