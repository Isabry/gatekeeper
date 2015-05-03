<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MenusTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('menus')->delete();

		$menus = [
			[
				'auth' => true,
				'href' => '/groups',
				'icon' => '<i class="fa fa-users"></i>',
				'label' => 'Groups',
				'permissions' => serialize(['administrators']),
				'side' => 'left',
			],
			[
				'auth' => true,
				'href' => '/users',
				'icon' => '<i class="fa fa-users"></i>',
				'label' => 'Users',
				'permissions' => serialize(['administrators']),
				'side' => 'left',
			],
			[
				'auth' => true,
				'href'  => '/auth/logout',
				'icon'  => '<i class="fa fa-power-off"></i>',
				'label' => 'Logout',
				'permissions' => serialize(['administrators','superusers','users']),
				'side' => 'right',
			],
			[
				'auth'  => false,
				'href'  => '/auth/login',
				'icon'  => '<i class="fa fa-external-link"></i>',
				'label' => 'Login',
				'permissions' => serialize([]),
				'side' => 'right',
			],
			[
				'auth'  => false,
				'href'  => '/auth/register',
				'icon'  => '<i class="fa fa-ioxhost"></i>',
				'label' => 'Register',
				'permissions' => serialize([]),
				'side' => 'right',
			],
		];

		DB::table('menus')->insert($menus);
	}
}
