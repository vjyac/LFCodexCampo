@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />

<div class="row">


	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">{{ $title }}</header>
			<div class="panel-body">

	{{ Form::open(array('route' => 'movimientos.reportefleteporproveedor', "autocomplete"=>"off"
, 'class' => 'panel-body wrapper-lg')) }}
								

				          @if (isset($flash_message))
				          <div class="alert alert-warning">{{ $flash_message }}</div>
				          @endif

										
								<div class="row">
									<div class="col-xs-5">
									<label>Fecha desde</label>
										{{ Form::text('fecha_desde', '', array('class' => 'datepicker-input form-control input-lg', 'id' =>'fecha_desde', 'placeholder' => 'Fecha', 'data-date-format' => 'dd-mm-yyyy')) }}
									</div>
								</div>

								<?php if ($errors->first('fecha_desde')) { ?>
										<span class="badge bg-danger">{{ $errors->first('fecha_desde') }}</span>
								<?php } ?>

								<div class="row">
									<div class="col-xs-5">
									<label>Fecha hasta</label>
										{{ Form::text('fecha_hasta', '', array('class' => 'datepicker-input form-control input-lg', 'id' =>'fecha_hasta', 'placeholder' => 'Fecha', 'data-date-format' => 'dd-mm-yyyy')) }}
									</div>
								</div>

								<?php if ($errors->first('fecha_hasta')) { ?>
										<span class="badge bg-danger">{{ $errors->first('fecha_hasta') }}</span>
								<?php } ?>
								


								<div class="form-group">
									<label>Proveedor flete</label>
									{{ Form::text('destino', '', array('class' => 'form-control input-lg', 'id' =>'destino', 'placeholder' => 'Ingrese el proveedor flete')) }}
									{{ Form::hidden('proveedorcliente_id' , Input::old('proveedorcliente_id'), array('id' =>'proveedorcliente_id')) }}	 
								</div>	 

								<?php if ($errors->first('proveedorcliente_id')) { ?>
										<span class="badge bg-danger">{{ $errors->first('proveedorcliente_id') }}</span>
								<?php } ?>

								<div class="form-group">
									<label>Producto</label>
									{{ Form::text('producto', '', array('class' => 'form-control input-lg', 'id' =>'producto', 'placeholder' => 'producto')) }}
									{{ Form::hidden('productos_id' , Input::old('productos_id'), array('id' =>'productos_id')) }}	 
								</div>	 
									 

								<?php if ($errors->first('productos_id')) { ?>
										<span class="badge bg-danger">{{ $errors->first('productos_id') }}</span>
								<?php } ?>

									

				<br>
				{{ Form::submit('Buscar movimientos', array('class' => 'btn btn-primary')) }}

				{{ Form::close() }}
			</div>
		</section>
	</div>
</div>


<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        
 

    $("#destino").autocomplete({
		source: "/clientesproveedors/search",
      	select: function( event, ui ) {
      		$( '#proveedorcliente_id' ).val( ui.item.id );
      }
  });


    $("#producto").autocomplete({
		source: "/productos/search",
      	select: function( event, ui ) {
      		$( '#productos_id' ).val( ui.item.id );
      }
  });



});

  
</script>

<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>

@stop