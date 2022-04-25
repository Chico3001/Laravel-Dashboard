<?php

namespace Database\Seeders;

use App\Models\Option;

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Option::insert([
			'name' => 'option_name_1',
			'value' => 'option_value_1',
		]);
	}
}
