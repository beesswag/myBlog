<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('comment');
<<<<<<< HEAD
            $table->integer('user_id');
=======
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('post_id')->references('id')->on('posts')->onDelete('cascade');
>>>>>>> c5f9843c7a54ab832c9935117064a05d70381ef6
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
        Schema::dropIfExists('comments');
    }
}
