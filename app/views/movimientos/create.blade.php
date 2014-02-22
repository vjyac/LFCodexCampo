@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />

<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/movimientos') }}">Movimientos Forestacion</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Ganaderia Movimientos</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'movimientos.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}
				
						
		<div class="form-group">
			<label>Fecha</label>
			{{ Form::text('fecha', '', array('class' => 'datepicker-input form-control input-lg', 'id' =>'fecha', 'placeholder' => 'Fecha', 'data-date-format' => 'dd-mm-yyyy')) }}
		</div>

		<?php if ($errors->first('fecha')) { ?>
			<span class="badge bg-danger">{{ $errors->first('fecha') }}</span>
		<?php } ?>

		<div class="form-group">
			<label>Tipo de movimiento</label>
				{{ Form::select( 'tipo_movimiento', array ('ingreso' => 'ingreso', 'egreso' => 'egreso') ,'ingreso' , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
		</div>

		<?php if ($errors->first('tipo_movimiento')) { ?>
			<span class="badge bg-danger">{{ $errors->first('tipo_movimiento') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Lote origen</label>
			{{ Form::text('lote', '', array('class' => 'form-control input-lg', 'id' =>'lote', 'placeholder' => 'Ingrese el lote')) }}
			{{ Form::hidden('lotes_id' , Input::old('lotes_id'), array('id' =>'lotes_id')) }}	 
		</div>	 

		<?php if ($errors->first('lotes_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('lotes_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Destino</label>
			{{ Form::text('destino', '', array('class' => 'form-control input-lg', 'id' =>'destino', 'placeholder' => 'Ingrese el destino')) }}
			{{ Form::hidden('proveedorcliente_id' , Input::old('proveedorcliente_id'), array('id' =>'proveedorcliente_id')) }}	 
		</div>	 

		<?php if ($errors->first('proveedorcliente_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('proveedorcliente_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Contratista</label>
			{{ Form::text('contratista', '', array('class' => 'form-control input-lg', 'id' =>'contratista', 'placeholder' => 'Ingrese el contratista')) }}
			{{ Form::hidden('contratistas_id' , Input::old('contratistas_id'), array('id' =>'contratistas_id')) }}	 
		</div>	 

		<?php if ($errors->first('contratistas_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('contratistas_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Documento tipos</label>
			{{ Form::text('documentostipo', '', array('class' => 'form-control input-lg', 'id' =>'documentostipo', 'placeholder' => 'Ingrese documento tipo')) }}
			{{ Form::hidden('documentostipos_id' , Input::old('documentostipos_id'), array('id' =>'documentostipos_id')) }}	 
		</div>	 

		<?php if ($errors->first('documentostipos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('documentostipos_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Nro Documento</label>
			{{ Form::text('numero_documento', '', array('class' => 'form-control input-lg', 'id' =>'numero_documento', 'placeholder' => 'Ingrese numero de documento')) }}
		</div>	

		<?php if ($errors->first('numero_documento')) { ?>
			<span class="badge bg-danger">{{ $errors->first('numero_documento') }}</span>
		<?php } ?>



		<div class="form-group">
			<label>Importe Total</label>
			{{ Form::text('importe_total', '', array('class' => 'form-control input-lg', 'id' =>'importe_total', 'placeholder' => 'Ingrese importe total')) }}
		</div>	

		<?php if ($errors->first('importe_total')) { ?>
			<span class="badge bg-danger">{{ $errors->first('importe_total') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Chofer</label>
			{{ Form::text('chofer', '', array('class' => 'form-control input-lg', 'id' =>'chofer', 'placeholder' => 'Ingrese chofer')) }}
			{{ Form::hidden('chofers_id' , Input::old('chofers_id'), array('id' =>'chofers_id')) }}	 
		</div>	 

		<?php if ($errors->first('chofers_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('chofers_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Chapa Vehiculo</label>
			{{ Form::text('vehiculo', '', array('class' => 'form-control input-lg', 'id' =>'vehiculo', 'placeholder' => 'Ingrese patente')) }}
			{{ Form::hidden('vehiculos_id' , Input::old('vehiculos_id'), array('id' =>'vehiculos_id')) }}	 
		</div>	 

		<?php if ($errors->first('vehiculos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('vehiculos_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Movimientos motivos</label>
			{{ Form::text('movimientomotivo', '', array('class' => 'form-control input-lg', 'id' =>'movimientomotivo', 'placeholder' => 'Ingrese movimiento motivo')) }}
			{{ Form::hidden('movimientomotivos_id' , Input::old('movimientomotivos_id'), array('id' =>'movimientomotivos_id')) }}	 
		</div>	 

		<?php if ($errors->first('movimientomotivos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('movimientomotivos_id') }}</span>
		<?php } ?>

	
		<div class="form-group">
			<label>Cantidad</label>
			{{ Form::text('cantidad', '', array('class' => 'form-control input-lg', 'id' =>'cantidad', 'placeholder' => 'cantidad')) }}
		</div>	 

		<?php if ($errors->first('cantidad')) { ?>
			<span class="badge bg-danger">{{ $errors->first('cantidad') }}</span>
		<?php } ?>
	
	
		<div class="form-group">
			<label>Producto</label>
			{{ Form::text('producto', '', array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'producto')) }}
			{{ Form::hidden('productos_id' , Input::old('productos_id'), array('id' =>'productos_id')) }}	 
		</div>	 
	 
		<?php if ($errors->first('productos_id')) { ?>
			<span class="badge bg-danger">{{ $errors->first('productos_id') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Peso Bruto</label>
			{{ Form::text('peso_bruto', '', array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'peso bruto')) }}			
		</div>	 
	 
		<?php if ($errors->first('peso_bruto')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_bruto') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Peso Tara</label>
			{{ Form::text('peso_tara', '', array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'producto')) }}
			
		</div>	 
	 
		<?php if ($errors->first('peso_tara')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_tara') }}</span>
		<?php } ?>


		<div class="form-group">
			<label>Peso Neto</label>
			{{ Form::text('peso_neto', '', array('class' => 'form-control input-lg', 'id' =>'peso_neto', 'placeholder' => 'peso_neto')) }}
			
		</div>	 

		<?php if ($errors->first('peso_neto')) { ?>
			<span class="badge bg-danger">{{ $errors->first('peso_neto') }}</span>
		<?php } ?>
	 

				<br>
				{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

				{{ Form::close() }}
			</div>







		</section>
	</div>
</div>


<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    $("#contratista").autocomplete({
		source: "/clientesproveedors/search",
      	select: function( event, ui ) {
      		$( '#contratistas_id' ).val( ui.item.id );
      }
  });


    $("#destino").autocomplete({
		source: "/clientesproveedors/search",
      	select: function( event, ui ) {
      		$( '#proveedorcliente_id' ).val( ui.item.id );
      }
  });

    $("#lote").autocomplete({
		source: "/lotes/search",
      	select: function( event, ui ) {
      		$( '#lotes_id' ).val( ui.item.id );
      }
  });


    $("#documentostipo").autocomplete({
		source: "/documentostipos/search",
      	select: function( event, ui ) {
      		$( '#documentostipos_id' ).val( ui.item.id );
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

    $("#movimientomotivo").autocomplete({
		source: "/movimientomotivos/search",
      	select: function( event, ui ) {
      		$( '#movimientomotivos_id' ).val( ui.item.id );
      }
  });


    $("#movimientomotivo").autocomplete({
		source: "/movimientomotivos/search",
      	select: function( event, ui ) {
      		$( '#movimientomotivos_id' ).val( ui.item.id );
      }
  });


    $("#producto").autocomplete({
		source: "/productos/search_forestacion",
      	select: function( event, ui ) {
      		$( '#productos_id' ).val( ui.item.id );
      }
  });






});

  
</script>

<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>

@stop