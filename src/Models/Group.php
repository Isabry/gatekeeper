<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */
namespace Isabry\Gatekeeper\Models;

use Debugbar;
use Schema;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	/**
	 * The database table used by the model.
	 *-------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'groups';

	/**
	 * Get group users.
	 *-------------------------------------------------------------------------
	 * @return users 
	 */
	public function users()
	{
		// Group <- Users
		return $this->belongsToMany('Isabry\Gatekeeper\Models\User', 'users_groups');
	}
}
