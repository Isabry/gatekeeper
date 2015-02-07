<?php

use Illuminate\Support\Facades\Config;

return array(

	/*
	 |--------------------------------------------------------------------------
	 | 
	 |--------------------------------------------------------------------------
	 |
	 | Debug is enabled by default, when debug is set to true in app.php.
	 |
	 */

	'debug' => Config::get('app.debug'),

	/*
	 |--------------------------------------------------------------------------
	 | 
	 |--------------------------------------------------------------------------
	 |
	 | Project information
	 |
	 */

	'project' => array(
		'name' => 'Laravel Starter',
		'description' => 'Laravel Starter will help you getting started with Laravel 4',
		'author' => 'Ismail Sabry',
	),

	/*
	 |--------------------------------------------------------------------------
	 | Top Menus
	 |--------------------------------------------------------------------------
	 |
	 | Top Menus Items
	 |
	 */
	'top_menus_mode' => array(
		'icon' => true,
		'label' => false,
	),

	'top_menus' => array(
		'dashboard' => array(
			'href'  => '/dashboard',
			'icon'  => '<i class="fa fa-dashboard"></i>',
			'label' => 'Dashboard',
		),
		'settings' => array(
			'href'  => '/settings',
			'icon'  => '<i class="fa fa-sliders"></i>',
			'label' => 'Settings',
		),
		'profile' => array(
			'href'  => '/profile',
			'icon'  => '<i class="fa fa-user"></i>',
			'label' => 'Profile',
		),
		'logout' => array(
			'href'  => '/logout',
			'icon'  => '<i class="fa fa-power-off"></i>',
			'label' => 'Logout',
		),
	),

	/*
	 |--------------------------------------------------------------------------
	 | Side Menus
	 |--------------------------------------------------------------------------
	 |
	 | Side Menus Items
	 |
	 */
	'side_menus_mode' => array(
		'icon' => true,
		'label' => true,
	),

	'side_menus' => array(
		'dashboard' => array(
			'href'  => '/dashboard',
			'icon'  => '<i class="fa fa-dashboard"></i>',
			'label' => 'Dashboard',
		),
		'organizations' => array(
			'href'  => '/organizations',
			'icon'  => '<i class="fa fa-building"></i>',
			'label' => 'Organizations',
		),
		'users' => array(
			'href'  => '/users',
			'icon'  => '<i class="fa fa-users"></i>',
			'label' => 'Users',
		),
		'settings' => array(
			'href'  => '/settings',
			'icon'  => '<i class="fa fa-sliders"></i>',
			'label' => 'Settings',
		),
		'profile' => array(
			'href'  => '/profile',
			'icon'  => '<i class="fa fa-user"></i>',
			'label' => 'Profile',
		),	),

);
