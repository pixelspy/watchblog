<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tag_post', function (Blueprint $table) {
             $table->integer('tag_id')->unsigned()->nullable();
             $table->foreign('tag_id')->references('id')
                   ->on('tags')->onDelete('cascade');

             $table->integer('post_id')->unsigned()->nullable();
             $table->foreign('post_id')->references('id')
                   ->on('posts')->onDelete('cascade');

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
         Schema::dropIfExists('tag_post');
     }
}
