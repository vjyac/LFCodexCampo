@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/clientesproveedors') }}">ciudads</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/clientesproveedors/create') }}">Crear nueva ciudad</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Clientes & Proveedores</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/clientesproveedors/' . $clientesproveedor->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}

		
					<?php
						$ciudad = Ciudad::find($clientesproveedor->ciudads_id);
					?>


						<div class="form-group">
							<label>Cliente Proveedor</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->clientesproveedor }}
							</div><br>
						</div>

						<div class="form-group">
							<label>Tipo</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->tipo }}
							</div><br>
						</div>

						<div class="form-group">
							<label>Ciudad</label>							
							<div class="form-control input-lg">
								{{ $ciudad->ciudad }}
							</div><br>
						</div>

						<div class="form-group">
							<label>Direccion</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->direccion }}
							</div><br>
						</div>

						<div class="form-group">
							<label>Telefono</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->telefono }}
							</div><br>
						</div>

						<div class="form-group">
							<label>Email</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->email }}
							</div><br>
						</div>


						<div class="form-group">
							<label>Estado</label>							
							<div class="form-control input-lg">
								{{ $clientesproveedor->estado }}
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