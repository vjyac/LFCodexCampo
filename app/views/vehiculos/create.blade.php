@extends('layouts.default')


@section('content')

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/vehiculos') }}">Vehiculos</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Agregar Vehiculo</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'vehiculos.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}



							<div class="form-group">
							<label>Cliente Proveedor</label>
							{{ Form::text('clientesproveedor', '', array('class' => 'form-control input-lg', 'id' =>'clientesproveedor', 'placeholder' => 'Ingrese un Proveedor')) }}
							{{ Form::hidden('clientesproveedors_id' , Input::old('clientesproveedors_id'), array('id' =>'clientesproveedors_id')) }}		
							<br></div>			
						
						<div class="form-group">
							<label>Patente</label>
							{{ Form::text('patente', '' , array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una patente')) }}<br></div>
							<?php 

							if ($errors->first('patente')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('patente') }}</span>
								<?php
							}
							?>							 


						<div class="form-group">
							<label>Descripcion</label>
							{{ Form::text('descripcion', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una descripcion')) }}<br></div>
							<?php 

							if ($errors->first('descripcion')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('descripcion') }}</span>
								<?php
							}
							?>							 
						

						<div class="form-group">
							<label>Tara kg</label>
							{{ Form::text('tara_kg', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese tara en kg')) }}<br></div>
							<?php 

							if ($errors->first('tara_kg')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('tara_kg') }}</span>
								<?php
							}
							?>							 
						

						<div class="form-group">
							<label>Carga maxima kg</label>
							{{ Form::text('carga_maxima_kg', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese carga maxima kg')) }}<br></div>
							<?php 

							if ($errors->first('carga_maxima_kg')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('carga_maxima_kg') }}</span>
								<?php
							}
							?>							 
						


						<div class="form-group">
							<label>Estado</label>
								{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo'), 'activo' , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
							<br></div>
						




				{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
			</div>
		</section>
	</div>
</div>


{{ Form::close() }}

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


});

  
</script>
@stop