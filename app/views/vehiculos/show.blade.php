@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/vehiculos') }}">Vehiculos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/vehiculos/create') }}">Crear nuevo vehiculo</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">vehiculos</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/vehiculos/' . $vehiculo->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


							<?php
								$clientesproveedor = Clientesproveedor::find($vehiculo->clientesproveedors_id);
							?>

						<div class="form-group">
							<label>Proveedor</label>
								<div class="form-control input-lg">
									{{ $clientesproveedor->clientesproveedor }}
								</div>
						</div>

						<div class="form-group">
							<label>Patente</label>
								<div class="form-control input-lg">
									{{ $vehiculo->patente }}
								</div>
						</div>

						<div class="form-group">
							<label>Descripcion</label>
								<div class="form-control input-lg">
									{{ $vehiculo->descripcion }}
								</div>
						</div>

						<div class="form-group">
							<label>Tara kg</label>
								<div class="form-control input-lg">
									{{ $vehiculo->tara_kg }}
								</div>
						</div>

						<div class="form-group">
							<label>Tara kg</label>
								<div class="form-control input-lg">
									{{ $vehiculo->tara_kg }}
								</div>
						</div>

						<div class="form-group">
							<label>Carga maxima kg</label>
								<div class="form-control input-lg">
									{{ $vehiculo->carga_maxima_kg }}
								</div>
						</div>


						<div class="form-group">
							<label>Estado</label>
								<div class="form-control input-lg">
									{{ $vehiculo->estado }}
								</div>
						</div>

	
	




						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	
<script src="/js/app.v2.js"></script>
@stop