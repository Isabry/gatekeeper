<?php
/**
 * Admin Laravel Install Command 
 *
 * @package   isabry/admin-laravel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @licence   http://mit-license.org/
 * @link      https://github.com/isabry/admin-laravel
 */

namespace Isabry\AdminLaravel\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command {

	/**
	* The console command name.
	*
	* @var	string
	*/
	protected $name = 'admin-laravel:install';

	/**
	* The console command description.
	*
	* @var	string
	*/
	protected $description = 'Install Admin Laravel';

    /**
    * The filesystem instance.
    *
    * @var \Illuminate\Filesystem\Filesystem
    */
    protected $files;

	/*-------------------------------------------------------------------------
	* Create a new command instance.
	*
	* @return void
	*/
	public function __construct(Filesystem $files)
	{
		parent::__construct();
		$this->files = $files;
	}

	/*-------------------------------------------------------------------------
	* Execute the console command.
	*
	* @return void
	*/
	public function fire()
	{
		$this->comment('');

		// Generate the Application Encryption key
		$this->comment('Application Encryption key');
		$this->call('key:generate');
		$this->comment('');

		// Publish the Package
		$this->comment('Publish the Package');
		$this->publishPackage();
		$this->comment('');

		// Create the migrations table
		$this->comment('Migrations');
		$this->migrateTables();
		$this->comment('');

		// Create the default user and default groups.
		$this->comment('Create default users/groups');
		$this->initConfig();
		$this->comment('');
	}

	/*-------------------------------------------------------------------------
	* Runs all the necessary Sentry commands.
	*
	* @return void
	*/
	protected function doYou($q="Do you really wish to run this command?")
	{
		if ( $this->confirm($q)) {
			return true;
		} else {
			$this->comment('Command Cancelled!');
			return false;
		}
	}

	/*-------------------------------------------------------------------------
	* Runs all the necessary Sentry commands.
	*
	* @return void
	*/
	protected function publishPackage()
	{

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		// Config
		if( $this->doYou('Do you really wish to publish config file?') ) {
			$this->call('config:publish', array('package' => 'isabry/admin-laravel'));
		}

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		// Assets
		if( $this->doYou('Do you really wish to publish assets files?') ) {
			$this->info("Publish the Package Assets");

			$source      = __DIR__.'/../../public';
			$destination = $this->laravel['path'].'/../public';

			if (!$this->files->exists($destination."/assets")) {
				$this->comment("Source: " . $source);
				$this->comment("Destination: ".$destination);
				$this->files->copyDirectory($source."/assets" , $destination."/assets");
				$this->files->copy($source."/favicon.png" , $destination."/favicon.png");
				$this->info('Assets created successfully!');
			}
			else {
				$this->error('Assets already exists!');
			}
		}

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		// 
		if( $this->doYou('Do you really wish to publish views files?') ) {
			$this->info("Publish the Package Views");

			$this->info('To Do');
		}


		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		// 
		if( $this->doYou('Do you really wish to publish controllers?') ) {
			$this->info("Publish the Package Controllers");

			$this->info('To Do');
		}

	}
	
	/*-------------------------------------------------------------------------
	* Runs all the necessary Sentry commands.
	*
	* @return void
	*/
	protected function migrateTables()
	{
		// Create the migrations table
		// $this->call('migrate:install');

		// Run the Sentry Migrations
		$this->info('Sentry Migrations');
		$this->call('migrate', array('--package' => 'cartalyst/sentry'));

		// Run the Migrations
		$this->info('Application Migrations');
		$this->call('migrate');
	}

	/*-------------------------------------------------------------------------
	* Runs all the necessary Sentry commands.
	*
	* @return void
	*/
	protected function initConfig()
	{
		$this->info('To Do');
	}
}
