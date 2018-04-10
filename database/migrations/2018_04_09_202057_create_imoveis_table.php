<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo_imovel');
            $table->string('codigo_imovel', 20);
            $table->string('tipo_imovel', 20);
            $table->string('cep', 15);
            $table->string('cidade', 50);
            $table->string('bairro', 50);
            $table->string('estado', 50);
            $table->string('rua', 50);
            $table->string('numero', 20);
            $table->string('complemento', 100);
            $table->decimal('valor_venda', 20, 2);
            $table->decimal('valor_locacao', 20, 2);
            $table->decimal('valor_temporada', 20, 2);
            $table->decimal('area', 20, 2);
            $table->integer('qt_dormitorios');
            $table->integer('qt_suites');
            $table->integer('qt_banheiros');
            $table->integer('qt_salas');
            $table->integer('qt_garagem');
            $table->text('descricao');
            $table->string('imagens')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
