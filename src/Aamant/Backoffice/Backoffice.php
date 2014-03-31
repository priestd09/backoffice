<?php namespace Aamant\Backoffice;

use Config;

class Backoffice
{
	protected $menu = null;

	public function __construct(\Aamant\Menu\Menu $menu)
	{
		$this->menu = $menu;

		$this->menu->addItem('dashbord', 
			\App::make('menu-item', array('url' => $this->baseurl(), 'label' => 'Dashbord', 'rank' => 1)));
		$this->menu->addItem('settings', 
			\App::make('menu-item', array('url' => $this->baseurl() . '/settings/general', 'label' => 'Settings', 'rank' => 10)));

		$submenu = \App::make('menu', array('label' => sprintf('%s %s', \Auth::user()->firstname, \Auth::user()->lastname), 'rank' => 1000));

		$submenu->addItem('profile', 
			\App::make('menu-item', array('url' => $this->baseurl() . '/profile', 'label' => 'Profile', 'rank' => 10)));
		$submenu->addItem('logout', 
			\App::make('menu-item', array('url' => '/auth/logout', 'label' => 'Logout', 'rank' => 1000)));
		$this->menu->addItem('user', $submenu);

		$this->menu->addItem('site', 
			\App::make('menu-item', array('url' => '/', 'label' => 'Voir le site', 'target' => '_blank', 'rank' => 20)));
	}

	public function menu()
	{
		$this->menu->sort();
		return $this->menu;
	}

	public function baseurl()
	{
		return Config::get('backoffice::base_url');
	}

	public function title()
	{
		return Config::get('settings.site_title');
	}

	public function config($key)
	{
		return Config::get('settings.'.$key);	
	}
}