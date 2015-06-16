<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table)
	    {
	        $table->increments('id');
	        $table->string('image_name')->unique();
	        $table->string('make');
	        $table->string('model');
	        $table->string('state');
	        $table->string('color');
	        $table->boolean('commercial');
	        $table->string('writing');
	        $table->boolean('hitch');
	        $table->string('image_url')->unique();

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
		Schema::drop('images');
	}

}
