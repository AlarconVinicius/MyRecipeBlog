<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('resumo');
            $table->text('conteudo');
            $table->integer('tempo_preparo');
            $table->integer('qtd_porcao');
            
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->foreignId('category_id');

            $table->unsignedBigInteger('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');

            $table->integer('views')->default(0);
            $table->string('status')->default('publicado');

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
        Schema::dropIfExists('posts');
    }
}
