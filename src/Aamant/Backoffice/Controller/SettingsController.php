<?php namespace Aamant\Backoffice\Controller;

use View, Input, Config, Redirect;
use Aamant\Backoffice\Model\Setting;

class SettingsController extends \BaseController
{
	public function index($group = 'general')
	{
		$settings = Setting::group($group)->get();
		return View::make('backoffice::settings.index', compact('settings'));
	}

	public function update()
	{
		foreach (Input::except('_token') as $key => $value){

			Config::set('bo.' . $key, $value);
			Setting::key($key)->update(array('value' => $value));
		}

		return Redirect::back()->with('flash_success', 'Modification effectué');
	}
}