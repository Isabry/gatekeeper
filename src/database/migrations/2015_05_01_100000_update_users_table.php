<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (BluePrint $table) {
			$table->boolean('enable')->default(true);
			$table->string('profile')->default("");	
			$table->enum('gender', ['male', 'female'])->default('male');
			$table->date('birthdate')->default("");
			$table->string('locale')->default('fr-FR');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()	
	{
	}
}