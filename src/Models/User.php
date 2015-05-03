<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */
namespace Isabry\Gatekeeper\Models;

use Illuminate\Validation\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *------------------------------------------------------------------------
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *------------------------------------------------------------------------
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *------------------------------------------------------------------------
	 * @var array
	 */
	public static $all_rules = array(
        'name'     => 'required|alpha_dash|min:3|max:200',
        'email'    => 'required|email|min:6|max:200|unique:users',
        'password' => 'required|alpha_dash|confirmed|min:6|max:200',
	);

	/**
	 *-------------------------------------------------------------------------
	 * validate creation rules
	 */
	public static function rulesCreation()
	{
		$rules = array(
			'name'     => static::$all_rules['name'],
			'email'    => static::$all_rules['email'],
			'password' => static::$all_rules['password'],
		);
		return $rules;
	}

	/**
	 *-------------------------------------------------------------------------
	 * validate update rules
	 */
	public static function rulesUpdate($id)
	{
		$rules = array(
			'name'     => static::$all_rules['name'], 
			'email'    => static::$all_rules['email'] . ',' . $id, 
		);
		return $rules;
	}

	/**
	 * Get user groups.
	 *-------------------------------------------------------------------------
	 * @return groups 
	 */
	public function groups()
	{
		// User <- Groups
		return $this->belongsToMany('Isabry\Gatekeeper\Models\Group', 'users_groups');
	}
}
