@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />

<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/movimientosganaderias') }}">Movimientos Forestacion</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Movimientos</header>
			<div class="panel-body">
				{{ Form::open(array('url' => URL::to('/movimientosganaderias/' . $movimientosganaderia->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}
				


		<?php
			
			$origenlotes = Lote::find($movimientosganaderia->origenlotes_id);
			$destinolotes = Lote::find($movimientosganaderia->destinolotes_id);
			$grupo = Grupo::find($movimientosganaderia->grupos_id);
			$documentostipo = Documentostipo::find($movimientosganaderia->documentostipos_id);
			$chofer = Chofer::find($movimientosganaderia->chofers_id);
			$vehiculo = Vehiculo::find($movimientosganaderia->vehiculos_id);


		?>

					




						
		<div class="form-group">
			<label>Fecha</label>
			{{ Form::text('fecha', $movimientosganaderia->fecha, array('class' => 'datepicker-input form-control input-lg', 'id' =>'fecha', 'placeholder' => 'Fecha', 'data-date-format' => 'dd-mm-yyyy')) }}
		</div>

		<?php if ($errors->first('fecha')) { ?>
			<span class="badge bg-danger">{{ $errors->first('fecha') }}</span>
		<?php } ?>

		<div class="form-group">
			<label>Tipo de movimiento</label>
				{{ Form::select( 'tipo_movimiento', array ('ingreso' => 'ingreso', 'egreso' => 'egreso') ,$movimientosganaderia->tipo_movimiento , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
		</div>

		<?php if ($errors->first('tipo_movimiento')) { ?>
			<span class="badge bg-danger">{{ $errors->first('tipo_movimiento') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Documento tipos</label>
			{{ Form::text('documentostipo', $documentostipo->documentostipo, array('class' => 'form-control input-lg', 'id' =>'documentostipo', 'placeholder' => 'Ingrese documento tipo')) }}
			{{ Form::hidden('documentostipos_id' , $movimientosganaderia->documentostipos_id, array('id' =>'documentostipos_id')) }}	 
		</div>	 

		<?php if ($errors->first('documentostipos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('documentostipos_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Nro Documento</label>
			{{ Form::text('numero_documento', $movimientosganaderia->numero_documento, array('class' => 'form-control input-lg', 'id' =>'numero_documento', 'placeholder' => 'Ingrese numero de documento')) }}
		</div>	

		<?php if ($errors->first('numero_documento')) { ?>
			<span class="badge bg-danger">{{ $errors->first('numero_documento') }}</span>
		<?php } ?>



		<div class="form-group">
			<label>Lote origen</label>
			{{ Form::text('origenlotes', $origenlotes->lote, array('class' => 'form-control input-lg', 'id' =>'origenlotes', 'placeholder' => 'Ingrese el lote origen')) }}
			{{ Form::hidden('origenlotes_id' , $movimientosganaderia->origenlotes_id, array('id' =>'origenlotes_id')) }}	 
		</div>	 

		<?php if ($errors->first('origenlotes_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('origenlotes_id') }}</span>
		<?php } ?>

		<div class="form-group">
			<label>Lote destino</label>
			{{ Form::text('destinolotes', $destinolotes->lote, array('class' => 'form-control input-lg', 'id' =>'destinolotes', 'placeholder' => 'Ingrese el lote destino')) }}
			{{ Form::hidden('destinolotes_id' , $movimientosganaderia->destinolotes_id, array('id' =>'destinolotes_id')) }}	 
		</div>	 

		<?php if ($errors->first('destinolotes_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('destinolotes_id') }}</span>
		<?php } ?>		


		<div class="form-group">
			<label>Grupo</label>
			{{ Form::text('grupo', $grupo->grupo, array('class' => 'form-control input-lg', 'id' =>'grupo', 'placeholder' => 'Ingrese el grupo')) }}
			{{ Form::hidden('grupos_id' , $movimientosganaderia->grupos_id, array('id' =>'grupos_id')) }}	 
		</div>	 

		<?php if ($errors->first('grupos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('grupos_id') }}</span>
		<?php } ?>		



		<div class="form-group">
			<label>Nro Cabezas</label>
			{{ Form::text('nro_cabezas', $movimientosganaderia->nro_cabezas, array('class' => 'form-control input-lg', 'id' =>'nro_cabezas', 'placeholder' => 'Ingrese numero de cabezas')) }}
		</div>	 

		<?php if ($errors->first('nro_cabezas')) { ?>
			<span class="badge bg-danger">{{ $errors->first('nro_cabezas') }}</span>
		<?php } ?>		






		<div class="form-group">
			<label>Chofer</label>
			{{ Form::text('chofer', $chofer->chofer, array('class' => 'form-control input-lg', 'id' =>'chofer', 'placeholder' => 'Ingrese chofer')) }}
			{{ Form::hidden('chofers_id' , $movimientosganaderia->chofers_id, array('id' =>'chofers_id')) }}	 
		</div>	 

		<?php if ($errors->first('chofers_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('chofers_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Chapa Vehiculo</label>
			{{ Form::text('vehiculo', $vehiculo->patente, array('class' => 'form-control input-lg', 'id' =>'vehiculo', 'placeholder' => 'Ingrese patente')) }}
			{{ Form::hidden('vehiculos_id' , $movimientosganaderia->vehiculos_id, array('id' =>'vehiculos_id')) }}	 
		</div>	 

		<?php if ($errors->first('vehiculos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('vehiculos_id') }}</span>
		<?php } ?>



		<div class="form-group">
			<label>Peso Bruto</label>
			{{ Form::text('peso_bruto', $movimientosganaderia->peso_bruto, array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'peso bruto')) }}			
		</div>	 
	 
		<?php if ($errors->first('peso_bruto')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_bruto') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Peso Tara</label>
			{{ Form::text('peso_tara', $movimientosganaderia->peso_tara, array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'producto')) }}
			
		</div>	 
	 
		<?php if ($errors->first('peso_tara')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_tara') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Peso Neto</label>
			{{ Form::text('peso_neto', $movimientosganaderia->peso_neto, array('class' => 'form-control input-lg', 'id' =>'peso_neto', 'placeholder' => 'peso neto')) }}
			
		</div>	 

		<?php if ($errors->first('peso_neto')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_neto') }}</span>
		<?php } ?>
	 





				<br>
				{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}

				{{ Form::close() }}
			</div>
		</section>
	</div>
</div>

<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    

    $("#documentostipo").autocomplete({
		source: "/documentostipos/search",
      	select: function( event, ui ) {
      		$( '#documentostipos_id' ).val( ui.item.id );
      }
  });

    $("#origenlotes").autocomplete({
		source: "/lotes/search",
      	select: function( event, ui ) {
      		$( '#origenlotes_id' ).val( ui.item.id );
      }
  });

    $("#destinolotes").autocomplete({
		source: "/lotes/search",
      	select: function( event, ui ) {
      		$( '#destinolotes_id' ).val( ui.item.id );
      }
  });

    $("#grupo").autocomplete({
		source: "/grupos/search",
      	select: function( event, ui ) {
      		$( '#grupos_id' ).val( ui.item.id );
      }
  });



    $("#chofer").autocomplete({
		source: "/chofers/search",
      	select: function( event, ui ) {
      		$( '#chofers_id' ).val( ui.item.id );
      }
  });



    $("#vehiculo").autocomplete({
		source: "/vehiculos/search",
      	select: function( event, ui ) {
      		$( '#vehiculos_id' ).val( ui.item.id );
      }
  });








});

  
</script>

<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
@stop