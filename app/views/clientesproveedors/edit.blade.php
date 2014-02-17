@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/clientesproveedors') }}">Movimientos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/clientesproveedors/create') }}">Crear nuevo movimiento</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('/clientesproveedors/' . $clientesproveedor->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}

						
					<?php
						$ciudad = Ciudad::find($clientesproveedor->ciudads_id);
					?>


					<div class="form-group">
					<label>Cliente Proveedor</label>
					{{ Form::text('clientesproveedor', $clientesproveedor->clientesproveedor, array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una cliente o proveedor')) }}
					<?php 

						if ($errors->
							first('clientesproveedor')) {
						?>
						<span class="badge bg-danger">{{ $errors->first('clientesproveedor') }}</span>

					<?php
						}
					?></div>


					<div class="form-group">
						<label>Tipo</label>
							{{ Form::select( 'tipo', array ('cliente' => 'cliente', 'proveedor' => 'proveedor') ,$clientesproveedor->tipo , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
						<br></div>
						

					<div class="form-group">
						<label>Ciudad</label>
						{{ Form::text('ciudad', $ciudad->ciudad, array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
						{{ Form::hidden('ciudads_id' , $clientesproveedor->ciudads_id, array('id' =>'ciudads_id')) }}
					<br>

					<div class="form-group">
						<label>Direccion</label>
							{{ Form::text('direccion', $clientesproveedor->direccion, array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una direccion')) }}
						<br></div>

					<div class="form-group">
						<label>Telefono</label>
							{{ Form::text('telefono', $clientesproveedor->telefono, array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una telefono')) }}
						<br></div>

					<div class="form-group">
						<label>Email</label>
							{{ Form::text('email', $clientesproveedor->email, array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una email')) }}
						<br></div>


					<div class="form-group">
						<label>Estado</label>
							{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo') ,$clientesproveedor->estado , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
						<br></div>


						{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    $("#ciudad").autocomplete({
		source: "/ciudads/search",
      	select: function( event, ui ) {
      		$( '#ciudads_id' ).val( ui.item.id );
      }
  });


});

  
</script>
@stop