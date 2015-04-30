<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_groups', function(Blueprint $table)
		{
            $table->increments('id');
            
            $table->integer('user_id');
            $table->integer('group_id');

            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->index('group_id');
            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_groups', function (Blueprint $table) {
			$table->dropForeign('users_groups_user_id_foreign');
			$table->dropForeign('users_groups_group_id_foreign');
		});
		Schema::drop('users_groups');
	}

}
