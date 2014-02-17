@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/productos') }}">Productos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/productos/create') }}">Crear nuevo producto</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">producto</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/productos/' . $producto->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}

					<?php
						$actividad = Actividad::find($producto->actividads_id);
						$productosunidadmedida = Productosunidadmedida::find($producto->productosunidadmedidas_id);
					?>



						<div class="form-group">
							<label>Producto</label>
								<div class="form-control input-lg">
									{{ $producto->producto }}
								</div><br>


						<div class="form-group">
							<label>Actividad</label>
								<div class="form-control input-lg">
									{{ $actividad->actividad }}
								</div><br>


						<div class="form-group">
							<label>Unidad de medida</label>
								<div class="form-control input-lg">
									{{ $productosunidadmedida->productosunidadmedida }}
								</div><br>

						<div class="form-group">
							<label>Producto Codigo</label>
								<div class="form-control input-lg">
									{{ $producto->producto }}
								</div><br>



						<div class="form-group">
							<label>Precio</label>
								<div class="form-control input-lg">
									{{ $producto->precio }}
								</div><br>


						<div class="form-group">
							<label>Estado</label>
								<div class="form-control input-lg">
									{{ $producto->estado }}
								</div><br>




						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop