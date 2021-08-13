<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fornecedor extends Model
{
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email']; // precisa 'AUTORIZAR' através do fillable os campos q podem ser preenchidos
    //pelo método create();

    public function produtos(){
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
