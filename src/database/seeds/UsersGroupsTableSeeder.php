<?php
/**
 * Users Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class UsersGroupsTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users_groups')->delete();

		$datetime = Carbon::now();

		$users_groups = [
			[
				'user_id' => 1,
				'group_id' => 100,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 2,
				'group_id' => 200,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 3,
				'group_id' => 300,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 101,
				'group_id' => 100,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 101,
				'group_id' => 300,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 102,
				'group_id' => 300,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 103,
				'group_id' => 300,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 104,
				'group_id' => 300,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];

		DB::table('users_groups')->insert($users_groups);
	}
}
