@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/establecimientos') }}">Establecimientos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('establecimientos/create') }}">Crear nueva establecimientos</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('/establecimientos/' . $establecimiento->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}



				<div class="form-group">
					<label>Establecimiento</label>
					{{ Form::text('establecimiento', $establecimiento->establecimiento, array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese una establecimiento')) }}
					<?php 

						if ($errors->
					first('establecimiento')) {
					?>
					<span class="badge bg-danger">{{ $errors->first('establecimiento') }}</span>

					<?php
						}
					?></div>


					<?php

							$clientesproveedor = clientesproveedor::find($establecimiento->clientesproveedors_id);
							$ciudad = ciudad::find($establecimiento->ciudads_id);
						
					?>


					<div class="form-group">
						{{ Form::text('Cliente', $clientesproveedor->clientesproveedor, array('class' => 'form-control input-lg', 'id' =>'clientesproveedor', 'placeholder' => 'Ingrese un cliente')) }}
						{{ Form::hidden('clientesproveedors_id' , $establecimiento->clientesproveedors_id, array('id' =>'clientesproveedors_id')) }}
					</div>
						
					<div class="form-group">
						{{ Form::text('ciudad', $ciudad->ciudad, array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
						{{ Form::hidden('ciudads_id' , $establecimiento->ciudads_id, array('id' =>'ciudads_id')) }}
					</div>












						{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        



    $("#clientesproveedor").autocomplete({
		source: "/clientesproveedors/search",
      	select: function( event, ui ) {
      		$( '#clientesproveedors_id' ).val( ui.item.id );
      }
  });


    $("#ciudad").autocomplete({
		source: "/ciudads/search",
      	select: function( event, ui ) {
      		$( '#ciudads_id' ).val( ui.item.id );
      }
  });






});

  
</script>
@stop