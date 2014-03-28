<?php namespace Aamant\Backoffice;

use Config;

class Backoffice
{
	protected $menu = null;

	public function __construct(\Aamant\Menu\Menu $menu)
	{
		$this->menu = $menu;

		$this->menu->addItem('dashbord', array('url' => $this->baseurl(), 'label' => 'Dashbord', 'rank' => 1));
		$this->menu->addItem('settings', array('url' => $this->baseurl() . '/settings/general', 'label' => 'Settings', 'rank' => 10));
		$this->menu->addItem('profile', array('url' => $this->baseurl() . '/profile', 'label' => 'Profile', 'rank' => 20));
		$this->menu->addItem('site', array('url' => '/', 'label' => 'Voir le site', 'target' => '_blank'));
	}

	public function menu()
	{
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