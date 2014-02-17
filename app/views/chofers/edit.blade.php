@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/chofers') }}">choferes</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/chofers/create') }}">Crear nuevo chofer</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('chofers/' . $chofer->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}



						<div class="form-group">
							<label>Chofer</label>
							{{ Form::text('chofer', $chofer->chofer , array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una chofer')) }}<br></div>

							<?php if ($errors->first('chofer')) { ?>
									<span class="badge bg-danger">{{ $errors->first('chofer') }}</span>
							<?php } ?>
						


						<div class="form-group">
							<label>Domicilio</label>
							{{ Form::text('domicilio', $chofer->domicilio, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un domicilio')) }}<br></div>
							<?php if ($errors->first('domicilio')) { ?>
									<span class="badge bg-danger">{{ $errors->first('domicilio') }}</span>
							<?php } ?>
						
							<?php

								$ciudad = Ciudad::find($chofer->ciudads_id);

							?>

							<div class="form-group">
							<label>Ciudad</label>
							{{ Form::text('ciudad', $ciudad->ciudad, array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
							{{ Form::hidden('ciudads_id' , $chofer->ciudads_id, array('id' =>'ciudads_id')) }}		
							<br></div>			

							<?php if ($errors->first('ciudads_id')) { ?>
									<span class="badge bg-danger">{{ $errors->first('ciudads_id') }}</span>
							<?php } ?>


						<div class="form-group">
							<label>Dni</label>
							{{ Form::text('dni', $chofer->dni, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un dni')) }}<br></div>

							<?php if ($errors->first('dni')) { ?>
									<span class="badge bg-danger">{{ $errors->first('dni') }}</span>
							<?php } ?>
						

						<div class="form-group">
							<label>Licencia</label>
							{{ Form::text('licencia', $chofer->licencia, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese nro licencia de conducir')) }}<br></div>

							<?php if ($errors->first('licencia')) { ?>
									<span class="badge bg-danger">{{ $errors->first('licencia') }}</span>
							<?php } ?>
						

						<div class="form-group">
							<label>Telefono</label>
							{{ Form::text('telefono', $chofer->telefono, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un telefono')) }}<br></div>

							<?php if ($errors->first('telefono')) { ?>
									<span class="badge bg-danger">{{ $errors->first('telefono') }}</span>
							<?php } ?>

						
						<div class="form-group">
							<label>Email</label>
							{{ Form::text('email', $chofer->email, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un email')) }}<br></div>

							<?php if ($errors->first('email')) { ?>
									<span class="badge bg-danger">{{ $errors->first('email') }}</span>
							<?php } ?>


						<div class="form-group">
							<label>Estado</label>
								{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo') ,$chofer->estado , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
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