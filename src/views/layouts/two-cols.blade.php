@extends('backoffice::layouts.one-col')

@section('content')
	<div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      @yield('sidebar')
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      @yield('main')
    </div>
  </div>
@stop