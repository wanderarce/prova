<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('valor', 8, 2);
            $table->string('telefone', 13);
            $table->timestamps();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}
