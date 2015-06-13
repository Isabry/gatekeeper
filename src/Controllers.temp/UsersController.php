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
use Input;
use Session;
use Redirect;
use Request;
use Hash;
use Isabry\Gatekeeper\Models\User;

class UsersController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $users = User::where('enable', 1)->with('groups')->paginate(10);
		$users = User::with('groups')->paginate(10);
		Debugbar::info("Users");			
		Debugbar::info($users->toArray());

		return View::make('gatekeeper::users.index')
						->with('title', 'User List')
						->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
			$user = User::with('groups')->findOrFail($id);
			Debugbar::info($user->toArray());

			$user_form = \FormBuilder::create('Isabry\Gatekeeper\Forms\UserForm', [
				// 'method' => 'PUT',
				// 'url' => route('users.store'),
				'model' => $user
			])
			->remove('password')
			->remove('password_confirmation');

			$url =  '<a role="button" href="'.route('users.index').'" class="btn btn-primary">' .
					'  <i class="fa fa-mail-reply"></i> Back to Users List' . 
					'</a>';

			return view('gatekeeper::users.view')
					->with('title', 'User ('.$user->name.')')
					->with(compact('user_form'))
					->with('url', $url);
					
		} catch (ModelNotFoundException $e) {
			Session::flash('error', 'User not found (id: ' . $id . ')');
			return Redirect::intended('users');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function enable($id)
	{
		$page = Input::get("page", 1);

		try {
			$user = User::findOrFail($id);
			$user->enable = 1 - Input::get('enable');
			$user->save();

			// Session::flash('info', 'Enable/Disable: (GET) <pre>'.print_r($_GET, true).'</pre>');
			Session::flash('success', 'The user <strong>'.$user->name.'</strong> was updated successfuly');

			return Redirect::intended('users?page='.$page);
		} catch (HTTPException $e) {
			Session::flash('error', 'User not found (id: ' . $id . ')');
			return Redirect::intended('users?page='.$page);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
