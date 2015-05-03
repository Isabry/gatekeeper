<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */
namespace Isabry\Gatekeeper\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
	protected $showFieldErrors = true;

	public function buildForm()
	{
		$this
			->add(  'name', 'text', [
					'label' => 'Name',
					'attr' => [
						'placeholder' => 'Enter name here...'
					],
				])
			->add(  'email', 'email', [
					'label' => 'E-Mail Address',
					'attr' => [
						'placeholder' => 'Enter email here...'
					],
				])
			->add(  'password', 'password', [
					'label' => 'Password',
				])
			->add(  'password_confirmation', 'password', [
					'label' => 'Confirm Password',
				])
			->add(  'enable', 'checkbox', [
					'label' => 'Enable',
				])
			->add(  'created_at', 'text', [
					'label' => 'Creation Date',
					'attr' => [
						'readonly' => true,
					],
				])
			->add(  'updated_at', 'text', [
					'label' => 'Update Date',
					'attr' => [
						'readonly' => true,
					],
				]);
	}
}
