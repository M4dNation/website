<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('parent_id')->unsigned()->nullable()->default(null);
        $table->string('name', 100);

        $table->foreign('parent_id')
              ->references('id')
              ->on('categories')
              ->onDelete('restrict')
              ->onUpdate('restrict');
      });

      Schema::create('threads', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('category_id')->unsigned();
        $table->string('title', 255);
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');

        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade')
              ->onUpdate('cascade');
      });

      Schema::create('posts', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('thread_id')->unsigned();
        $table->text('message');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');

        $table->foreign('thread_id')
              ->references('id')
              ->on('threads')
              ->onDelete('cascade')
              ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('categories', function(Blueprint $table)
      {
        $table->dropForeign('categories_parent_id_foreign');
      });
      Schema::drop('categories');
    }
}
