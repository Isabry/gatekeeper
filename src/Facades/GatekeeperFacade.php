<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

namespace Isabry\Gatekeeper\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class GatekeeperFacade extends Facade {
 
	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { 
		return 'gatekeeper'; 
	}
 
}