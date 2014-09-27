<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_translations', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->integer('tag_id')->unsigned();
			$table->string('locale')->index();
			$table->unique(['tag_id','locale']);
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_translations');
	}

}
