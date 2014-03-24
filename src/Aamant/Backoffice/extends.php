<?php

/** Set Option in Config */
if (Schema::hasTable('settings'))
{
	foreach (Aamant\Backoffice\Model\Setting::get() as $option){
		Config::set('bo.' . $option->key, $option->value);
	}
}

View::composer('backoffice::settings.menu', function($view)
{
	$group = array();
	foreach (Aamant\Backoffice\Model\Setting::groupBy('group')->lists('group') as $name){
		$group[] = array(
			'name'	=> trans('backoffice::messages.' . $name),
			'url'	=> Config::get('backoffice::base_url') . '/settings/' . $name
		);
	}
	$view->with('groups', $group);
});

Validator::extend('password', function($attribute, $value, $parameters){
	return Hash::check($value, $parameters[0]);
});
