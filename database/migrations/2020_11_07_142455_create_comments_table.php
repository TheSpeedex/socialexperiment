<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cmessage');
            $table->unsignedBigInteger('profiles_id');
            $table->unsignedBigInteger('posts_id');
            $table->timestamps();

            $table->foreign('profiles_id')->references('id')->
                on('profiles')->onDelete('cascade')->
                onUpdate('cascade');

            $table->foreign('posts_id')->references('id')->
            on('posts')->onDelete('cascade')->
            onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
