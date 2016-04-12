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
            $table->integer('image_id')->unsigned()->default(0);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('quote', 255);
            $table->integer('m4dnation_role')->unsigned()->default(0);
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('image_id')
                ->references('id')
                ->on('image')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // Password Reset Table
        Schema::create('password_resets', function (Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            
            $table->timestamp('created_at');
        });

        // Category table
        Schema::create('category', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->string('name', 100);
            $table->integer('total_view')->unsigned()->default(0);
            $table->integer('total_thread')->unsigned()->default(0);
            $table->integer('total_post')->unsigned()->default(0);
            $table->integer('total_vote')->unsigned()->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('category')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        // Thread table
        Schema::create('thread', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('last_post_id')->unsigned()->nullable();
            $table->boolean('is_pinned')->default(0);
            $table->integer('state')->unsigned();
            $table->string('title', 255);
            $table->integer('total_view')->unsigned()->default(0);
            $table->integer('total_post')->unsigned()->default(0);
            $table->integer('total_vote')->unsigned()->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // Post table
        Schema::create('post', function(Blueprint $table)
        { 
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('thread_id')->unsigned();
            $table->text('content');
            $table->integer('total_vote')->unsigned()->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('thread_id')
                ->references('id')
                ->on('thread')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('user_post', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('post_id')
                ->references('id')
                ->on('post')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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

        // Guide Table
        Schema::create('guide', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 255);
            $table->integer('state')->unsigned();
            $table->integer('visibility')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        // Tutorial table
        Schema::create('tutorial', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('guide_id')->unsigned();
            $table->string('title', 255);
            $table->text('content');
            $table->integer('state')->unsigned();
            $table->integer('visibility')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('guide_id')
                ->references('id')
                ->on('guide')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::create('tutorial_image', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tutorial_id')->unsigned();
            $table->integer('image_id')->unsigned();

            $table->foreign('tutorial_id')
                ->references('id')
                ->on('tutorial')
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
        Schema::drop('categorie');
        Schema::drop('thread');
        Schema::drop('post');
        Schema::drop('user_post');
        Schema::drop('article');
        Schema::drop('article_image');
        Schema::drop('guide');
        Schema::drop('tutorial');
        Schema::drop('tutorial_image');
    }
}
