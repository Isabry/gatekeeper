<?php
/**
 * Gatekeeper 
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

namespace Isabry\Gatekeeper;

use Auth;
use Debugbar;
use Config;
use Illuminate\Filesystem\Filesystem;

use Isabry\Gatekeeper\Models\Menu;
use Isabry\Gatekeeper\Models\User;

class Gatekeeper {

	/*-------------------------------------------------------------------------
	*
	*/
	public function __construct()
	{

	}

	/**
	 * Get Project Name
	 *
	 * @return project name
	 */
	public static function getProjectName()
	{
		if( Config::has('project.project.name') ) {
			$name = Config::get('project.project.name');
		} else {
			$name = Config::get('gatekeeper.project.name');
		}
		return $name;
	}

	/**
	 * Get Project Name
	 *
	 * @return project name
	 */
	public static function getProjectTitle()
	{
		if( Config::has('project.project.title') ) {
			$name = Config::get('project.project.title');
		} else {
			$name = Config::get('gatekeeper.project.title');
		}
		return $name;
	}

	/**
	 * Get Project Copyright
	 *
	 * @return project copyright
	 */
	public static function getProjectCopyright()
	{
		if( Config::has('project.project.author') ) {
			$author = Config::get('project.project.author');
		} else {
			$author = Config::get('gatekeeper.project.author');
		}
		$copyright = "By " . $author . " - Copyright &copy; " . date("Y");

		return $copyright;
	}

	/**
	 * Get Profile.
	 *
	 * @return Profile (picture)
	 */
	public static function getProfile($user)
	{
		if( isset($user->id) ) {
			// Debugbar::info($user->toArray());
			$profile =  strlen($user->profile) ? 
						$user->profile :
						"pics/" . $user->gender . ".png";				
		} else {
			$profile = "pics/anonymous.png";
		}

		return asset($profile);
	}

	/**
	 * Get Menu.
	 *
	 * @return menus
	 */
	public static function getMenus($side='left')
	{
		$auth = Auth::check();

		$menus = Menu::getMenus($auth, $side)->get();
		// Debugbar::info('Menus ' . $side);
		// Debugbar::info($menus->toArray());

		if($auth) {
			$id  = Auth::user()->id;
			// $user = User::with('groups')->find($id);
			// $user = User::findOrFail($id);
			// Debugbar::info('User ');
			// Debugbar::info($user->toArray());
			// foreach ( $menus as $key => $menu ) {
			// 	// Debugbar::info($menu->toArray());
			// 	$permissions = unserialize($menu->permissions);
			// 	Debugbar::info($permissions);
			// 	if(!in_array($user->role, $permissions)) {
			// 		unset($menus[$key]);
			// 		// Debugbar::info('===('.$key.')===> pas ici :' . $user->role);
			// 	}
			// }
		}

		return $menus;
	}
}
?>