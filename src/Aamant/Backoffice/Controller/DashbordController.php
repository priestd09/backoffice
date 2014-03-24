<?php namespace Aamant\Backoffice\Controller;

use View;

class DashbordController extends \BaseController {

	public function index()
	{
		return View::make('backoffice::dashbord.index');
	}
}