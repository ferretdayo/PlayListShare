<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email')->unique();
            $table->string('user_pass', 256);
            $table->timestamps();
        });
        Schema::create('profile', function (Blueprint $table) {
            $table->integer('user_id')->primary()->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('user')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->string('user_nickname', 45);
            $table->mediumText('description')->nullable();
            $table->mediumText('user_avatar')->nullable();
            $table->timestamps();
        });
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('comment_text', 256)->nullable();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('music', function (Blueprint $table) {
            $table->increments('music_id');
            $table->integer('user_id')->nullable()->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('user')
				->onUpdate('cascade')
				->onDelete('set null');
            $table->timestamps();
        });
        Schema::create('playlist', function (Blueprint $table) {
            $table->increments('playlist_id');
            $table->integer('user_id')->nullable()->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('user')
				->onUpdate('cascade')
				->onDelete('set null');
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_tag', 45);
        });
        Schema::create('playlist_category', function (Blueprint $table) {
            $table->increments('middle_id');
			$table->integer('playlist_id')->unsigned();
			$table->foreign('playlist_id')
				->references('playlist_id')
				->on('playlist')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')
				->references('category_id')
				->on('category')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
        Schema::create('music_category', function (Blueprint $table) {
            $table->increments('middle_id');
			$table->integer('music_id')->unsigned();
			$table->foreign('music_id')
				->references('music_id')
				->on('music')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')
				->references('category_id')
				->on('category')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
        Schema::create('subcomment', function (Blueprint $table) {
            $table->increments('subcomment_id');
            $table->integer('comment_id')->unsigned();
			$table->foreign('comment_id')
				->references('comment_id')
				->on('comment')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->string('sub_comment', 256)->nullable();
            $table->timestamps();
        });
        Schema::create('user_follower', function (Blueprint $table) {
            $table->increments('middle_id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('follower_id')->unsigned();
			$table->foreign('follower_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
        Schema::create('user_follow', function (Blueprint $table) {
            $table->increments('middle_id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('follow_id')->unsigned();
			$table->foreign('follow_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
        Schema::create('user_favorite', function (Blueprint $table) {
            $table->increments('favorite_id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('music_id')->nullable()->unsigned();
			$table->foreign('music_id')
				->references('music_id')
				->on('music')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('playlist_id')->nullable()->unsigned();
			$table->foreign('playlist_id')
				->references('playlist_id')
				->on('playlist')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
        Schema::create('good', function (Blueprint $table) {
            $table->increments('good_id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('user_id')
				->on('profile')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('music_id')->nullable()->unsigned();
			$table->foreign('music_id')
				->references('music_id')
				->on('music')
				->onUpdate('cascade')
				->onDelete('cascade');
            $table->integer('playlist_id')->nullable()->unsigned();
			$table->foreign('playlist_id')
				->references('playlist_id')
				->on('playlist')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
        Schema::drop('profile');
        Schema::drop('comment');
        Schema::drop('subcomment');
        Schema::drop('user_follower');
        Schema::drop('user_follow');
        Schema::drop('music');
        Schema::drop('playlist');
        Schema::drop('category');
        Schema::drop('playlist_category');
        Schema::drop('music_category');
        Schema::drop('user_favorite');
        Schema::drop('good');
    }
}
