<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    public function clientes(){
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }

    public function produtos(){
        //return $this->belongsToMany('App\Produto', 'pedidos_produtos'); 
        // o segundo parametro é a tabela q estabelece o relacionamento NxN
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'id');
        //nomes não padronizados
        /* 
            1 - Modelo de Relacionamento NxN em relação o MOdelo q estamos implementando 
            2 - é a tabela auxiliar que armazena os regitros de relacionamento 
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
        */
    }
}
