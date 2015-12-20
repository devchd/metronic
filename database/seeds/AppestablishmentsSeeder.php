<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AppestablishmentsSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$times = 5;

		for($i=0;$i<$times;$i++){
		    Appestablishments::create(
                array(
                    'name' => Str::random(),
                    'active' => rand(0,1)
                )
            );
		}
	}

}
