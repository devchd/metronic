<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Tb_App_CategoriesSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$times = 5;

		for($i=0;$i<$times;$i++){
		    Tb_App_Categories::create(
                array(
                    'name' => Str::random(),
                    'active' => rand(0,1)
                )
            );
		}
	}

}
