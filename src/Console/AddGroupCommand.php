<?php
/**
 * Gatekeeper  
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

namespace Isabry\Gatekeeper\Console;

use Illuminate\Console\Command;

class AddGroupCommand extends Command
{
	protected $name = 'gatekeeper:add-group';
	protected $description = 'Add Group';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->info('gatekeeper:add-group => Todo');
	}
}