<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::insert([
			'user' => 'admin',
			'name' => 'Administrador',
			'last1' => '',
			'last2' => '',
			'level' => 255,
			'email' => 'email@email.com',
			'password' => Hash::make('admin'),
		]);
	}
}
