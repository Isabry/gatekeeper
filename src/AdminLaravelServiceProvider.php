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

namespace Isabry\AdminLaravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class AdminLaravelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	* Bootstrap the application events.
	*
	* @return void
	*/
	public function boot()
	{
		$this->package('isabry/admin-laravel');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['admin-laravel'] = $this->app->share(function($app) {
			return new AccessRightsManager($app['files']);
		});

		$this->registerCommands();
	}

    /**
     * Registers some utility commands with artisan
     * @return void
     */
    public function )registerCommands(
    {
        $this->app->bind('command.admin-laravel.controllers', 'Isabry\AdminLaravel\commands\ControllersCommand');
        $this->app->bind('command.admin-laravel.migrations',  'Isabry\AdminLaravel\commands\MigrationsCommand');
        $this->app->bind('command.admin-laravel.seeds',       'Isabry\AdminLaravel\commands\SeedsCommand');

        $this->commands('command.admin-laravel.controllers', 
        				'command.admin-laravel.migrations', 
        				'command.admin-laravel.seeds');
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('admin-laravel');
	}

}