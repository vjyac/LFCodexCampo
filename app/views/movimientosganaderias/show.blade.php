@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="/js/jquery.number.min.js"></script>

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/movimientosganaderias') }}">Movimientos Ganaderias</a>
	</div>

</nav>

<section class="panel panel-default">
	<header class="panel-heading font-bold">Movimientos</header>
	<div class="panel-body">

		<?php
			$origenlotes = Lote::find($movimientosganaderia->origenlotes_id);
			$destinolotes = Lote::find($movimientosganaderia->destinolotes_id);
			$grupo = Grupo::find($movimientosganaderia->grupos_id);
			$documentostipo = Documentostipo::find($movimientosganaderia->documentostipos_id);
		?>

		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					<label>Lotes</label>
					<div class="form-control input-lg">
						De: {{ $origenlotes->lote }} a: {{ $destinolotes->lote }}
					</div>
				</div>
			</div>
		</div>


	<div class="row">
	  <div class="col-md-8">
		<label>Tipo y Nro de Docuemento</label>
			<div class="form-control input-lg">
				{{ $documentostipo->documentostipo }} nro: {{ str_pad($movimientosganaderia->numero_comprobante, 12, '0', STR_PAD_LEFT) }}
			</div>		
	  </div>
	  <div class="col-md-4">
			<label>Peso Neto:</label>
			<div class="form-control input-lg">
				{{ $movimientosganaderia->peso_neto }}
			</div>
		
	  </div>
	</div>


{{ Form::open(array('route' => 'movimientosganaderiascuerpos.store', 'class' => 'panel-body wrapper-lg')) }}
{{ Form::hidden('movimientosganaderias_id' , $movimientosganaderia->id, array('id' =>'movimientosganaderias_id')) }}  	

<?php
	if ($movimientosganaderia->estado == 'abierto') {
?>

		<div class="row">
		  <div class="col-md-3">Producto</div>
		  <div class="col-md-3">Caravana</div>
		  <div class="col-md-2">Kilos</div>
		  <div class="col-md-2">Observaciones</div>
		  <div class="col-md-1">Accion</div>
		</div>


			<div class="row">
			  <div class="col-md-3">
				{{ Form::text('producto', '', array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => '')) }}
				{{ Form::hidden('productos_id' , Input::old('producto_id'), array('id' =>'productos_id')) }}  	
			  </div>
			  <div class="col-md-3">
				{{ Form::text('caravana', Input::old('caravana'), array('class' => 'form-control input-lg', 'id' =>'caravana', 'placeholder' => '')) }}
			  </div>
			  <div class="col-md-2">
			  	{{ Form::text('kilos', Input::old('kilos'), array('class' => 'form-control input-lg', 'id' =>'bonificacion', 'placeholder' => '')) }}
			  </div>
			  <div class="col-md-2">
			  	{{ Form::text('observaciones', Input::old('observaciones'), array('class' => 'form-control input-lg', 'id' =>'observaciones', 'placeholder' => '')) }}
			  </div>
			  <div class="col-md-1">
						{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
			  </div>
			</div>

		{{ Form::close() }}

<?php

	}

?>


	{{ View::make('movimientosganaderiascuerpos.index', array('id' => $movimientosganaderia->id)) }} 


	</div>

</section>

		<?php if (Session::get('message')) { ?>
			<span class="badge bg-danger">{{ Session::get('message') }}</span><br>
		<?php } ?>

<?php
	if ($movimientosganaderia->estado == 'abierto') {
?>

<a href='/movimientosganaderias/{{ $movimientosganaderia->id }}/cerrar' class='btn btn-primary'>Cerrar</a>

<?php

	}
	
?>


<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        
	
	$('#kilos').number( true, 0 );
	

    $("#producto").autocomplete({
		source: "/productos/search_ganaderia",
      	select: function( event, ui ) {
      		$( '#productos_id' ).val( ui.item.id );
      }
  });


});

  
</script>

@stop