<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table -> string('titulo', 50)->nullable(false);
            $table -> string('descripcion', 200)->nullable();
            $table -> boolean('estado')->default(false);
            $table -> longText('contenido')->nullable(false);
            $table->timestamps();
            $table -> foreignid('id_categoria')->constrained('categorias');
            $table -> foreignid('id_usuario')->constrained('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
