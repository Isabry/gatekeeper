<?php
/**
 * Admin Laravel Service Provider 
 *
 * @package   isabry/admin-laravel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @licence   http://mit-license.org/
 * @link      https://github.com/isabry/admin-laravel
 */

namespace Isabry\AdminLaravel\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class AdminLaravelFacade extends Facade {
 
	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { 
		return 'admin-laravel'; 
	}
 
}