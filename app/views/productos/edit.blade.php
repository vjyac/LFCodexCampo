@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/productos') }}">productos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/chofers/create') }}">Crear nuevo producto</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('productos/' . $producto->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}




				<div class="form-group">
					<label>Producto</label>
					{{ Form::text('producto', $producto->producto, array('class' => 'form-control input-lg', 'placeholder'
					=> 'Ingrese un producto')) }}<br></div>
					<?php 

					if ($errors->first('producto')) {
						?>
						<span class="badge bg-danger">{{ $errors->first('producto') }}</span>
						<?php
					}
					?>
					
					<?php
						$actividad = actividad::find($producto->actividads_id);
						$productosunidadmedida = productosunidadmedida::find($producto->productosunidadmedidas_id);
					?>


					<div class="form-group">
						<label>Actividad</label>
						{{ Form::text('actividad', $actividad->actividad, array('class' => 'form-control input-lg', 'id' =>'actividad', 'placeholder' => 'Ingrese una actividad')) }}

						{{ Form::hidden('actividads_id' , $producto->actividads_id, array('id' =>'actividads_id')) }}
						<br>

					</div>



					<div class="form-group">
						<label>Unidad de medida</label>
						{{ Form::text('productosunidadmedida', $productosunidadmedida->productosunidadmedida, array('class' => 'form-control input-lg', 'id' =>'productosunidadmedida', 'placeholder' => 'Ingrese una unida de medida')) }}

						{{ Form::hidden('productosunidadmedidas_id' , $producto->productosunidadmedidas_id, array('id' =>'productosunidadmedidas_id')) }}
						<br>

					</div>



					<div class="form-group">
						<label>Producto Codigo</label>
						{{ Form::text('producto_codigo', $producto->producto_codigo, array('class' => 'form-control input-lg', 'placeholder'
						=> 'Ingrese un producto codigo')) }}<br></div>
						<?php 

						if ($errors->first('producto_codigo')) {
							?>
							<span class="badge bg-danger">{{ $errors->first('producto_codigo') }}</span>
							<?php
						}
						?>							 
						

						<div class="form-group">
							<label>Precio</label>
							{{ Form::text('precio', $producto->precio, array('class' => 'form-control input-lg', 'placeholder'
							=> 'Ingrese un precio')) }}<br></div>
							<?php 

							if ($errors->first('precio')) {
								?>
								<span class="badge bg-danger">{{ $errors->first('precio') }}</span>
								<?php
							}
							?>							 



							<div class="form-group">
								<label>Estado</label>
								{{ Form::select( 'estado', array ('activo' => 'activo', 'inactivo' => 'inactivo') ,$producto->estado , array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
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


					$("#actividad").autocomplete({
						source: "/actividads/search",
						select: function( event, ui ) {
							$( '#actividads_id' ).val( ui.item.id );
						}
					});

					$("#productosunidadmedida").autocomplete({
						source: "/productosunidadmedidas/search",
						select: function( event, ui ) {
							$( '#productosunidadmedidas_id' ).val( ui.item.id );
						}
					});


				});


				</script>


@stop