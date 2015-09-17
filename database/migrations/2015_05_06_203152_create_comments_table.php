<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('suggestion_id')->unsigned();
            $table->foreign('suggestion_id')->references('id')->on('suggestions')->ondelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->text('content');
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
        Schema::table('comments',function(Blueprint $table){
            $table->dropforeign('comments_suggestion_id_foreign');
            $table->dropColumn('suggestion_id');
        });
	}

}
