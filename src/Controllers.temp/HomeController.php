<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */
namespace Isabry\Gatekeeper\Controllers;

use Auth;
use View;
use Debugbar;
use URL;

use Isabry\Gatekeeper\Models\User;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('roles');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('gatekeeper::home.index');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		if( Auth::check() ) {
			Debugbar::info(Auth::user()->toArray());
		}
		return view('gatekeeper::home.dashboard');
	}

	/**
	 * Show the user profile.
	 *
	 * @return Response
	 */
	public function profile()
	{
		try {
			$user = User::with('groups')->findOrFail(Auth::user()->id);
			Debugbar::info($user->toArray());

			$user_form = \FormBuilder::create('Isabry\Gatekeeper\Forms\UserForm', [
				// 'method' => 'PUT',
				// 'url' => route('users.store'),
				'model' => $user
			])
			->remove('password')
			->remove('password_confirmation');


			return view('gatekeeper::home.profile')
							->with(compact('user_form'))
							->with('user', $user);
		} catch (ModelNotFoundException $e) {
			Session::flash('error', 'User not found (id: ' . $id . ')');
			return Redirect::intended('/');
		}
	}

}