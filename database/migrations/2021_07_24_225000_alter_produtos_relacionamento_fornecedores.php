<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a coluna em produtos q que vai receber a fk de fornecedors
        Schema::table('produtos', function(Blueprint $table){
            //insere um registro de fornecedor para estabelecer o relacionamento
            // é preciso inserir um registro somente quando a table da PK já está populada
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'ES',
                'email' => 'contato@fornecedorpadraosg.com.br',
            ]);
            //coluna que vai receber a fk
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            //constraint
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
