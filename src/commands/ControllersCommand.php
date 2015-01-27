<?php
/**
 * This file is part of the Isabry/adminlaravel package.
 *
 * Copyright (c) Ismail SABRY
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Isabry\AdminLaravel;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ControllersCommand extends Command
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'admin-laravel:controllers';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a stub Admin Laravel controllers';

	/**
	 * The filesystem instance.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * Create a new reminder table command instance.
	 *
	 * @param  \Illuminate\Filesystem\Filesystem $files
	 * @return \LucaDegasperi\OAuth2Server\Console\OAuthControllerCommand
	 */
	public function __construct(Filesystem $files)
	{
		parent::__construct();

		$this->files = $files;
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$controllers = [
			[
				"name"  => "UsersController";
				"des"   => __DIR__.'/../controllers/UsersController.php';
				"des"   => $this->laravel['path'].'/controllers/UsersController.php';
				"route" => "Route::resource('admin/users', 'UsersController');"
			],
			[
				"name"  => "GroupsController";
				"des"   => __DIR__.'/../controllers/GroupsController.php';
				"des"   => $this->laravel['path'].'/controllers/GroupsController.php';
				"route" => "Route::resource('admin/groups', 'GroupsController');"
			],
		];

		foreach($controllers as $controller) {
			if (!$this->files->exists($controller["des"])) {
				$this->files->copy($controller["src"], $controller["des"]);

				$this->info($controller["name"] . ' controller created successfully!');

				$this->comment("Routes:");
				$this->comment($controller["route"] );
			}
			else {
				$this->error($controller["name"] . 'controller already exists!');
			}
		}

	}
}