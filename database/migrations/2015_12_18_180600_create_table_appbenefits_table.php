<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableAppbenefitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appbenefits', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('name');
            $table->boolean('active')->default(true);
            
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
		Schema::drop('appbenefits');
	}

}