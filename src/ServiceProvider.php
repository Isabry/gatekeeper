<?php
/**
 * Gatekeeper Service Provider 
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

namespace Isabry\Gatekeeper;

use Illuminate\Filesystem\Filesystem;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

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
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		// Publish a config file
		$this->publishes([
			__DIR__.'/../config/gatekeeper.php' => config_path('gatekeeper.php')
		], 'config');

		// Publish assets
		$this->publishes([
			__DIR__.'/../assets/favicon.png' => base_path('/public/favicon.png'),
			__DIR__.'/../assets/css' => base_path('/public/css'),
			__DIR__.'/../assets/img' => base_path('/public/img'),
			__DIR__.'/../assets/pics' => base_path('/public/pics'),
			__DIR__.'/../assets/js' => base_path('/public/js'),
			__DIR__.'/../assets/fonts' => base_path('/public/font'),
			__DIR__.'/../assets/font-awesome' => base_path('/public/font-awesome'),
		], 'assets');

		// Publish migrations
		$this->publishes([
			__DIR__.'/database/migrations/' => base_path('/database/migrations')
		], 'migrations');


		// Publish seeds
		$this->publishes([
			__DIR__.'/database/seeds/' => base_path('/database/seeds')
		], 'seeds');


		include __DIR__.'/routes.php';

		$this->loadViewsFrom(__DIR__.'/views', 'gatekeeper');


		$this->app['gatekeeper'] = $this->app->share(function($app) {
			return new Gatekeeper();
		});


		$this->app->bind('command.gatekeeper.AddUser',  'Isabry\Gatekeeper\Console\AddUserCommand');
		$this->app->bind('command.gatekeeper.AddGroup', 'Isabry\Gatekeeper\Console\AddGroupCommand');

		$this->commands('command.gatekeeper.AddUser', 'command.gatekeeper.AddGroup');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('gatekeeper');
	}

}