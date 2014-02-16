@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/movimientos') }}">Movimientos</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Movimientos</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'clientesproveedors.store', "autocomplete"=>"off"
, 'class' => 'panel-body wrapper-lg')) }}
				<div class="form-group">
					<label>Cliente Proveedor</label>
					{{ Form::text('clientesproveedor', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una cliente o proveedor')) }}
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
							{{ Form::select( 'tipo', array ('cliente' => 'cliente', 'proveedor' => 'proveedor') ,'cliente' , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
						<br></div>
						

					<div class="form-group">
						<label>Ciudad</label>
						{{ Form::text('ciudad', '', array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
						{{ Form::hidden('ciudads_id' , Input::old('ciudads_id'), array('id' =>'ciudads_id')) }}
					<br>

					<div class="form-group">
						<label>Direccion</label>
							{{ Form::text('direccion', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una direccion')) }}
						<br></div>

					<div class="form-group">
						<label>Telefono</label>
							{{ Form::text('telefono', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una telefono')) }}
						<br></div>

					<div class="form-group">
						<label>Email</label>
							{{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una email')) }}
						<br></div>


					<div class="form-group">
						<label>Estado</label>
							{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo') ,'estado' , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
						<br></div>

				{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
			</div>
			</div>
		</section>
	</div>
</div>


{{ Form::close() }}

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