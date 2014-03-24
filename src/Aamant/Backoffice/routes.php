<?php

$base = Config::get('backoffice::base_url');

Route::group(array('before' => 'auth'), function() use ($base)
{
	Route::get($base, array(
		'as' => 'backoffice.dashbord.index',
		'uses' => 'Aamant\Backoffice\Controller\DashbordController@index'
	));

	Route::get($base.'/settings/{group?}', array(
		'as' => 'backoffice.settings.index',
		'uses' => 'Aamant\Backoffice\Controller\SettingsController@index'
	));
	Route::post($base.'/settings/update', array(
		'as' => 'backoffice.settings.index',
		'uses' => 'Aamant\Backoffice\Controller\SettingsController@update'
	));

	Route::get($base.'/profile', array(
		'as' => 'backoffice.profile.index',
		'uses' => 'Aamant\Backoffice\Controller\ProfileController@index'
	));
	Route::post($base.'/profile/update', array(
		'as' => 'backoffice.profile.update',
		'uses' => 'Aamant\Backoffice\Controller\ProfileController@update'
	));
});