<?php namespace Aamant\Backoffice\Controller;

class ProfileController extends \BaseController
{
	public function index()
	{
		$user = \Auth::user();

		Return \View::make('backoffice::profile.index', compact('user'));
	}

	public function update()
	{
		$user = \Auth::user();
		$data = \Input::all();

		$rules = [
			'email'			=> 'required|email|unique:users,email,' . $user->id,
			'firstname'		=> 'required',
			'lastname'		=> 'required',
			'old_password'	=> 'password:'. $user->password,
			'password'		=> 'required_with:old_password|confirmed|min:8'
		];
		$validator = \Validator::make($data, $rules, array(
			'password' => 'Le mot de passe n\'est pas valide',
			'required_with' => 'Le champ mot de passe est obligatoire'
		));
		if ($validator->fails()){
			return \Redirect::back()->withErrors($validator);
		}

		if ($data['password'] == ''){
			unset($data['password']);
		} else {
			//$data['password'] = \Hash::make($data['password']);
		}
		unset($data['password_confirmation']);
		unset($data['old_password']);

		$user->update($data);
		return \Redirect::back()->with('flash_success', 'modification effectuée');
	}
}