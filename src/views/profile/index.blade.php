@extends('backoffice::layouts.two-cols')

@section('title')
	- Profile
@stop

@section('sidebar')
	
@stop

@section('main')
	<div class="row profile">
		<div class="col-sm-12">
			{{ Form::model($user, array('class' => "form-horizontal", 'route' => 'backoffice.profile.update'))}}
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-7">
						{{ Form::text('email', null, array('class' => 'form-control')) }}
					</div>
					@if ($errors->has('email'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('email') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="firstname" class="col-sm-3 control-label">Prénom</label>
					<div class="col-sm-7">
						{{ Form::text('firstname', null, array('class' => 'form-control')) }}
					</div>
					@if ($errors->has('firstname'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('firstname') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="lastname" class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-7">
						{{ Form::text('lastname', null, array('class' => 'form-control')) }}
					</div>
					@if ($errors->has('lastname'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('lastname') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="old_password" class="col-sm-3 control-label">Mot de passe</label>
					<div class="col-sm-7">
						{{ Form::password('old_password', array('placeholder' => 'Mot de passe', 'class' => 'form-control'))}}
					</div>
					@if ($errors->has('old_password'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('old_password') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Nouveau mot de passe</label>
					<div class="col-sm-7">
						{{ Form::password('password', array('placeholder' => 'Nouveau mot de passe', 'class' => 'form-control'))}}
					</div>
					@if ($errors->has('password'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('password') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="password_confirmation" class="col-sm-3 control-label">Confirmation</label>
					<div class="col-sm-7">
						{{ Form::password('password_confirmation', array('placeholder' => 'Confirmation du nouveau mot de passe', 'class' => 'form-control'))}}
					</div>
					@if ($errors->has('password_confirmation'))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
					</div>
					@endif
				</div>

				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-3 text-right">
						<button type="submit" class="btn btn-primary">Enregistrer</button>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
@stop