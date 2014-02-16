@extends('layouts.default')


@section('content')

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/grupoalertas') }}">Grupo alertas</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Agregar grupoalertas</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'grupoalertas.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}


						<div class="form-group">
							<label>Grupo_id</label>
							{{ Form::text('grupo', '', array('class' => 'form-control input-lg', 'id' =>'grupo', 'placeholder' => 'Ingrese un grupo_id')) }}
							{{ Form::hidden('grupo_id' , Input::old('grupo_id'), array('id' =>'grupo_id')) }}




							<label>Fecha</label>
							{{ Form::text('fecha', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una fecha')) }}<br></div>
							<?php 

							if ($errors->first('fecha')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('fecha') }}</span>
								<?php
							}
							?>							 
						


						<div class="form-group">
							<label>Alerta</label>
							{{ Form::text('alerta', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una alerta')) }}<br></div>
							<?php 

							if ($errors->first('alerta')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('alerta') }}</span>
								<?php
							}
							?>							 
						
							<!--
							<div class="form-group">
							<label>Ciudad</label>
							{{ Form::text('ciudad', '', array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
							{{ Form::hidden('ciudads_id' , Input::old('ciudads_id'), array('id' =>'ciudads_id')) }}		
							<br></div>			


						<div class="form-group">
							<label>Dni</label>
							{{ Form::text('dni', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un dni')) }}<br></div>
							<?php 

							if ($errors->first('dni')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('dni') }}</span>
								<?php
							}
							?>							 
						

						<div class="form-group">
							<label>Licencia</label>
							{{ Form::text('licencia', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese nro licencia de conducir')) }}<br></div>
							<?php 

							if ($errors->first('licencia')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('licencia') }}</span>
								<?php
							}
							?>							 
						

						<div class="form-group">
							<label>Telefono</label>
							{{ Form::text('telefono', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un telefono')) }}<br></div>
						
						<div class="form-group">
							<label>Email</label>
							{{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un email')) }}<br></div>


						<div class="form-group">
							<label>Estado</label>
								{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo') ,'activo' , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
							<br></div>
						-->



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
        

    $("#grupo").autocomplete({
		source: "/grupos/search",
      	select: function( event, ui ) {
      		$( '#grupos_id' ).val( ui.item.id );
      }
  });


});

</script>
@stop