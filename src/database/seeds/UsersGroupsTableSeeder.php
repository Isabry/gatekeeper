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
				'group_id' => 1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 2,
				'group_id' => 2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 3,
				'group_id' => 3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 4,
				'group_id' => 2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 4,
				'group_id' => 3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];

		DB::table('users_groups')->insert($users_groups);
	}
}
