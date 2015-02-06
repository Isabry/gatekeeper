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

	/*-------------------------------------------------------------------------
	* Create a new command instance.
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->comment('=====================================');
		$this->comment('');
		$this->info('  Etape 1');
		$this->comment('');
		$this->info('    Merci de suivre les instructions');
		$this->info('    ci-dessous pour creer votre ');
		$this->info('    utilisateur principal.');
		$this->comment('');
		$this->comment('-------------------------------------');
		$this->comment('');
	}
}
