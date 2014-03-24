@extends('backoffice::layouts.two-cols')

@section('title')
	- Settings
@stop
@section('sidebar')
	@include('backoffice::settings.menu')
@stop

@section('main')
	<div class="row settings">
		<div class="col-sm-12">
			{{ Form::open(array('class' => "form-horizontal", 'url' => Config::get('backoffice::base_url') . '/settings/update'))}}
				@foreach ($settings as $setting)
				<div class="form-group">
					<label for="{{$setting->key}}" class="col-sm-3 control-label">{{trans('backoffice::messages.' . $setting->key)}}</label>
					<div class="col-sm-7">
						{{ Form::text($setting->key, $setting->value, array('class' => 'form-control')) }}
					</div>
					@if ($errors->has($setting->key))
					<div class="col-sm-7 col-sm-offset-3">
						<p class="text-danger">{{ $errors->first($setting->key) }}</p>
					</div>
					@endif
				</div>
				@endforeach
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-3 text-right">
						<button type="submit" class="btn btn-primary">Enregistrer</button>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
@stop