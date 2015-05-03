<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */
namespace Isabry\Gatekeeper\Models;

use Auth;
use DB;
use Debugbar;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'menus';

	/**------------------------------------------------------------------------
	 * Get the Left Menu.
	 *
	 * @return left menu 
	 */
	public static function getMenus($auth, $side='left')
	{
		$menus = parent::where('enable', '=', true)
						->where('auth', '=', $auth)
						->where('side', '=', $side);

		return $menus;
	}

}