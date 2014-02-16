@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/movimientos') }}">Movimientos Forestacion</a>
	</div>

</nav>

<section class="panel panel-default">
	<header class="panel-heading font-bold">Movimientos</header>
	<div class="panel-body">

	<div class="col-sm-6">

	{{ Form::open(array('url' => '/movimientos/' . $movimiento->id, 'class' => 'panel-body wrapper-lg')) }}
	{{ Form::hidden('_method', 'DELETE') }}


		<?php

				$proveedorcliente = clientesproveedor::find($movimiento->proveedorcliente_id);
				$lote = lote::find($movimiento->lotes_id);
				$documentostipo = documentostipo::find($movimiento->documentostipos_id);
				$chofer = chofer::find($movimiento->chofers_id);
				$vehiculo = vehiculo::find($movimiento->vehiculos_id);
				$movimientomotivo = movimientomotivo::find($movimiento->movimientomotivos_id);
				$producto = producto::find($movimiento->productos_id);

		?>


				<div class="form-group">
					<label>Fecha</label>
							<div class="form-control input-lg datepicker-input" data-date-format="dd-mm-yyyy">
								{{ $movimiento->fecha }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Tipo de movimiento</label>
							<div class="form-control input-lg">
								{{ $movimiento->tipo_movimiento }}
							</div><br>
				</div>

				<div class="form-group">
					<label>Lote</label>
							<div class="form-control input-lg">
								{{ $lote->lote }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Destino</label>
							<div class="form-control input-lg">
								{{ $proveedorcliente->clientesproveedor }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Documento tipos</label>
							<div class="form-control input-lg">
								{{ $documentostipo->documentostipo }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Nro Documento</label>
							<div class="form-control input-lg">
								{{ $movimiento->numero_documento }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Chofer</label>
							<div class="form-control input-lg">
								{{ $chofer->chofer }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Patente</label>
							<div class="form-control input-lg">
								{{ $vehiculo->patente }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Motivo Movimiento</label>
							<div class="form-control input-lg">
								{{ $movimientomotivo->movimientomotivo }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Cantidad</label>
							<div class="form-control input-lg">
								{{ $movimiento->cantidad }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Producto</label>
							<div class="form-control input-lg">
								{{ $producto->producto }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Peso Bruto</label>
							<div class="form-control input-lg">
								{{ $movimiento->peso_bruto }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Peso Tara</label>
							<div class="form-control input-lg">
								{{ $movimiento->peso_tara }}
							</div><br>
				</div>
	

				<div class="form-group">
					<label>Peso Neto</label>
							<div class="form-control input-lg">
								{{ $movimiento->peso_neto }}
							</div><br>
				</div>
	
	
  
			{{ Form::submit('Eliminar', array('class' => 'btn btn-primary')) }}
						
  
	{{ Form::close() }}



</div>

</div>

</section>



<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        
	
  
</script>

@stop