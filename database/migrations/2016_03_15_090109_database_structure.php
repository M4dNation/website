<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Image table
        Schema::create('image', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('format', 255);
            $table->string('path', 255);

            $table->timestamps();
            $table->softDeletes();
        });

        // User table
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Password Reset Table
        Schema::create('password_resets', function (Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            
            $table->timestamp('created_at');
        });

        // Article table
        Schema::create('article', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 255);
            $table->text('content');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('article_image', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('image_id')->unsigned();

            $table->foreign('article_id')
                ->references('id')
                ->on('article')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('image_id')
                ->references('id')
                ->on('image')
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
        Schema::drop('image');
        Schema::drop('users');
        Schema::drop('password_resets');
        Schema::drop('article');
        Schema::drop('article_image');
    }
}
