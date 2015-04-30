<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');

			$table->boolean('auth')->default(true);
			$table->string('href');
			$table->string('icon');
			$table->string('icon_visible')->default(true);
			$table->string('label');
			$table->string('label_visible')->default(true);

			$table->boolean('permissions')->default('');

			$table->enum('side', ['left', 'right'])->default('left');
			$table->boolean('enable')->default(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}
}
