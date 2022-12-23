<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 120)->unique();
            $table->string('cpf', 11)->unique();
            $table->date('birth');
            $table->integer('sex');
            $table->string('cell_phone', 15);
            $table->string('occupation', 120);
            $table->integer('marital_state');
            $table->string('addr_street', 120);
            $table->string('addr_number', 10);
            $table->string('addr_neighborhood', 120);
            $table->string('addr_city', 45);
            $table->string('addr_cep', 15);
            $table->integer('addr_uf_id');
            $table->string('addr_complement', 45);
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
        Schema::dropIfExists('clients');
    }
}
