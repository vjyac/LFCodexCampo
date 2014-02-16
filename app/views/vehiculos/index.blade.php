@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/vehiculos') }}">Vehiculos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/vehiculos/create') }}">Crear nuevo vehiculos</a>
	</ul>
</nav>


	<?php


		if (count($vehiculos)>0 )  {


?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Patente</th>
												<th>Proveedor</th>
												<th>Descripcion</th>
												<th>tara_kg</th>
												<th>Carga Max. kg.</th>
												<th>Estado</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>
											
												<?php



											foreach ($vehiculos as $vehiculo)
											{
													
													$clientesproveedor = clientesproveedor::find($vehiculo->clientesproveedors_id);

													echo "<tr>";
											        echo "<td>" . $vehiculo->patente . "</td>";
											        echo "<td>" . $clientesproveedor->clientesproveedor . "</td>";
											        echo "<td>" . $vehiculo->descripcion . "</td>";
											        echo "<td>" . $vehiculo->tara_kg . "</td>";
											        echo "<td>" . $vehiculo->carga_maxima_kg . "</td>";
											        echo "<td>" . $vehiculo->estado . "</td>";
											        
											        echo "<td>" ;
													echo "<a href='/vehiculos/" . $vehiculo->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";
													echo "<a href='/vehiculos/" . $vehiculo->id . "' class='btn btn-xs btn-info'>Ver</a> ";
													print "</td>";
													print "</tr>";

											    
											}


												?>

											
									</tbody>
								</table>
							</div>
							<footer class="panel-footer">

<div class="row">
									<div class="col-sm-4 hidden-xs">
										<!-- <select class="input-sm form-control input-s-sm inline">
											<option value="0">Bulk action</option>
											<option value="1">Delete selected</option>
											<option value="2">Bulk edit</option>
											<option value="3">Export</option>
										</select> -->
									</div>
									<div class="col-sm-4 text-center">
										<!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
									</div>
									<div class="col-sm-4 text-right text-center-xs">

									{{ $vehiculos->links()}}

									</div>
								</div>

							</footer>
						</section>
<?php

		}


	?>	

<script src="/js/app.v2.js"></script>

@stop