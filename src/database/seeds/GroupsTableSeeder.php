<?php
/**
 * Groups Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->delete();

        $datetime = Carbon::now();

		// GET: Retrieve an entity
		// POST: Create a new entity
		// PUT: Update an entity 
		// DELETE: Delete the entity.
        $groups = [
			[
				'name' => 'administrators',
				'permissions' => serialize([]),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'name' => 'superusers',
				'permissions' => serialize([]),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'name' => 'users',
				'permissions' => serialize([]),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
        ];

        DB::table('groups')->insert($groups);
    }
}
