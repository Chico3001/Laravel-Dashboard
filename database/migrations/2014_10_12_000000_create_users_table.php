<?php

use App\Models\UserCodes;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('user', 20)->unique();
			$table->unsignedTinyInteger('status')->default(UserCodes::ENABLED);	// See UserCodes Model
			$table->string('name', 40);
			$table->string('last1', 40);
			$table->string('last2', 40)->nullable();
			$table->string('email', 200)->nullable();
			$table->unsignedTinyInteger('level')->default(0);
			$table->unsignedTinyInteger('group')->default(0);
			$table->string('image', 200)->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
			$table->timestamp('email_verified_at')->nullable();
			$table->mediumText('extras')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
