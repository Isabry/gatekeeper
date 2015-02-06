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
    public function registerCommands()
    {
        $this->app->bind('command.admin-laravel.install', 'Isabry\AdminLaravel\commands\InstallCommand');
        $this->app->bind('command.admin-laravel.seed',    'Isabry\AdminLaravel\commands\SeedCommand');

        $this->commands('command.admin-laravel.install', 
        				'command.admin-laravel.seed');
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