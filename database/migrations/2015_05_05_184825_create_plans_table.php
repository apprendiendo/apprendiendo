<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->integer('topic');
            $table->string('app_url');
            $table->string('app_title');
            $table->string('app_description');
            $table->string('app_image');
            $table->string('ebook_url');
            $table->string('ebook_title');
            $table->string('ebook_description');
            $table->string('ebook_image');
            $table->string('video_url');
            $table->string('video_title');
            $table->string('video_description');
            $table->string('video_image');
            $table->text('how_to_use');
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
        Schema::table('plans',function(Blueprint $table){
            $table->dropforeign('plans_user_id_foreign');
            $table->dropColumn('user_id');
        });
		//Schema::drop('plans');
	}

}
