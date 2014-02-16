@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/grupoalertas') }}">Grupo alertas</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/grupoalertas/create') }}">Crear nueva Alerta</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Alerta</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/grupoalertas/' . $grupoalerta->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


						<?php
								$grupo = grupo::find($elemento->grupos_id);
							?>

							<div class="form-group">
								<label>Grupo_id</label>
									<div class="form-control input-lg">
											{{ $grupo->grupo }}
									</div>
							</div>

						<div class="form-group">
							<label>Fecha</label>
								<div class="form-control input-lg">
									{{ $grupoalerta->fecha }}
								</div><br>


						<div class="form-group">
							<label>Alerta</label>
								<div class="form-control input-lg">
									{{ $grupoalerta->alerta }}
								</div><br>

							<!--
							<?php

							$grupo_ = ciudad::find($chofer->ciudads_id);

							?>


						<div class="form-group">
							<label>Ciudad</label>
								<div class="form-control input-lg">
									{{ $ciudad->ciudad }}
								</div><br>						

						<div class="form-group">
							<label>Dni</label>
								<div class="form-control input-lg">
									{{ $chofer->dni }}
								</div><br>


						<div class="form-group">
							<label>Licencia</label>
								<div class="form-control input-lg">
									{{ $chofer->licencia }}
								</div><br>
						

						<div class="form-group">
							<label>Telefono</label>
								<div class="form-control input-lg">
									{{ $chofer->telefono }}
								</div><br>
						

						<div class="form-group">
							<label>Email</label>
								<div class="form-control input-lg">
									{{ $chofer->email }}
								</div><br>

						<div class="form-group">
							<label>Estado</label>
								<div class="form-control input-lg">
									{{ $chofer->estado }}
								</div><br>
						-->

						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop