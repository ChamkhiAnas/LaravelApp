<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_tag', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('post_id')->unique();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('tag_id')->unique();
            $table->foreign('tag_id')->references('id')->on('tags');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('post_tag');

    }
}
