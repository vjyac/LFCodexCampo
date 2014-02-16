@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/establecimientos') }}">Establecimientos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/establecimientos/create') }}">Crear nuev establecimientos</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">ciudad</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/establecimientos/' . $establecimiento->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


				<div class="form-group">
					<label>Establecimiento</label>
							<div class="form-control input-lg">
								{{ $establecimiento->establecimiento }}
							</div><br>
				</div>


					<?php

							$clientesproveedor = clientesproveedor::find($establecimiento->clientesproveedors_id);
							$ciudad = ciudad::find($establecimiento->ciudads_id);
						
					?>


				<div class="form-group">
					<label>Clientes</label>
							<div class="form-control input-lg">
								{{ $clientesproveedor->clientesproveedor }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Ciudad</label>
							<div class="form-control input-lg">
								{{ $ciudad->ciudad }}
							</div><br>
				</div>






						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop