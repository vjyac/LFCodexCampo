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
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Establecimientoes</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'establecimientos.store', "autocomplete"=>"off"
, 'class' => 'panel-body wrapper-lg')) }}




				<div class="form-group">
					<label>Establecimiento</label>
					{{ Form::text('establecimiento', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese un establecimiento')) }}
					<?php 

						if ($errors->
					first('establecimiento')) {
					?>
					<span class="badge bg-danger">{{ $errors->first('establecimiento') }}</span>

					<?php
						}
					?></div>

					<div class="form-group">
						{{ Form::text('clientesproveedor', '', array('class' => 'form-control input-lg', 'id' =>'clientesproveedor', 'placeholder' => 'Ingrese una clientesproveedor')) }}
						{{ Form::hidden('clientesproveedors_id' , Input::old('clientesproveedors_id'), array('id' =>'clientesproveedors_id')) }}
					</div>
						
					<div class="form-group">
						{{ Form::text('ciudad', '', array('class' => 'form-control input-lg', 'id' =>'ciudad', 'placeholder' => 'Ingrese una ciudad')) }}
						{{ Form::hidden('ciudads_id' , Input::old('ciudads_id'), array('id' =>'ciudads_id')) }}
					</div>




				<br>
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


    $("#ciudad").autocomplete({
		source: "/ciudads/search",
      	select: function( event, ui ) {
      		$( '#ciudads_id' ).val( ui.item.id );
      }
  });


});

  
</script>
@stop