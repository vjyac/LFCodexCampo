@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/grupos') }}">Grupo</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('grupos/create') }}">Crear un nuevo Grupo</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('/grupos/' . $grupo->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}




						<div class="form-group">
							<label>Grupo</label>
							{{ Form::text('grupo', $grupo->grupo, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un grupo')) }}<br></div>
							<?php 

							if ($errors->first('grupo')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('grupo') }}</span>
								<?php
							}
							?>							 
							




						<div class="form-group">



						{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>

@stop