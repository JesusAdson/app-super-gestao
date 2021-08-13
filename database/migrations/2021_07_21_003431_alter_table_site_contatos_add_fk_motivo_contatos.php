<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criar uma nova coluna chamada motivo_contatos_id
        //Migrar os dados de motivo_contato para motivo_contato_id
        //Aplicar a fk em motivo_contato_id apontando para a coluna id da table motivo_contatos e por fim remover a coluna motivo_contatos

        Schema::table('site_contatos', function(Blueprint $table){
            //Criar uma nova coluna chamada motivo_contatos_id
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //Migrar os dados de motivo_contato para motivo_contato_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato'); 
        //passa como paramentro uma instrução sql e essa instrução é executada dentro do banco

        Schema::table('site_contatos', function(Blueprint $table){
            //Aplicando a fk e removendo a coluna motivo_contato
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function(Blueprint $table){
            //criando a coluna motivo_contato e removendo a fk
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign'); //nome-table_coluna_foreign
        });

        //migrar os dados de motivo_contato_id para a coluna motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //remover a coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
