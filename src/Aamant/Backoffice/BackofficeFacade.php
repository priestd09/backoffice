<?php namespace Aamant\Backoffice;

use Illuminate\Support\Facades\Facade;

class BackofficeFacade extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'backoffice'; }
}