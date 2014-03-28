<?php namespace Aamant\Backoffice;

use Illuminate\Support\ServiceProvider;
use User, Config, Schema, View, App, Request, Auth;
use Aamant\Backoffice\Model\Setting;
use Aamant\Backoffice\Auth\AdminGuard;

class BackofficeServiceProvider extends ServiceProvider {

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
		$this->package('aamant/backoffice');

		if (! in_array('Aamant\Backoffice\UserInterface', class_implements('User') )) {
			throw new Exception('The User class must be implement Aamant\Backoffice\UserInterface');
		}

		include __DIR__.'/routes.php';
		include __DIR__.'/extends.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('backoffice', function() {
			return new Backoffice(\App::make('menu'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
