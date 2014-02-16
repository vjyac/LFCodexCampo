@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/grupos') }}">Grupo</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Agregar Grupo</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'grupos.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}


						<div class="form-group">
							<label>Grupo</label>
							{{ Form::text('grupo', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un grupo')) }}<br></div>
							<?php 

							if ($errors->first('grupo')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('grupo') }}</span>
								<?php
							}
							?>							 





						<div class="form-group">



				{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
			</div>
		</section>
	</div>
</div>


{{ Form::close() }}

<script src="/js/app.v2.js"></script>


@stop