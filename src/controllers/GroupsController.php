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
use Isabry\Gatekeeper\Models\Group;

class GroupsController extends Controller {

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
		// $groups = Group::where('enable', 1)->with('users')->paginate(10);
		$groups = Group::with('users')->paginate(10);
		Debugbar::info("Groups");			
		Debugbar::info($groups->toArray());

		return View::make('gatekeeper::groups.index')
						->with('title', 'Group List')
						->with('groups', $groups);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
			$group = Group::with('users')->findOrFail($id);
			Debugbar::info($group->toArray());

			$group_form = \FormBuilder::create('Isabry\Gatekeeper\Forms\GroupForm', [
				// 'method' => 'PUT',
				// 'url' => route('users.store'),
				'model' => $group
			]);

			$url =  '<a role="button" href="'.route('groups.index').'" class="btn btn-primary">' .
					'  <i class="fa fa-mail-reply"></i> Back to Users List' . 
					'</a>';

			return view('gatekeeper::groups.view')
					->with('title', 'Group ('.$group->name.')')
					->with(compact('group_form'))
					->with('url', $url);
					
		} catch (ModelNotFoundException $e) {
			Session::flash('error', 'User not found (id: ' . $id . ')');
			return Redirect::intended('group');
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
			$group = Group::findOrFail($id);
			$group->enable = 1 - Input::get('enable');
			$group->save();

			// Session::flash('info', 'Enable/Disable: (GET) <pre>'.print_r($_GET, true).'</pre>');
			Session::flash('success', 'The user <strong>'.$group->name.'</strong> was updated successfuly');

			return Redirect::intended('groups?page='.$page);
		} catch (HTTPException $e) {
			Session::flash('error', 'Group not found (id: ' . $id . ')');
			return Redirect::intended('groups?page='.$page);
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
