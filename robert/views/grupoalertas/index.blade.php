@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/grupoalertas') }}">Grupo alertas</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('grupoalertas/create') }}">Crear nuevo grupoalertas</a>
	</ul>
</nav>


	<?php


		if (count($grupoalertas)>0 )  {


?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Grupo_id</th>
												<th>Fecha</th>
												<th>Alerta</th>
												<!--<th>Licencia</th>
												<th>Telefono</th> -->
												<th>Accion</th> 
											</tr>
										</thead>
										<tbody>
											
												<?php



											foreach ($grupoalertas as $grupoalerta)
											{
													
													echo "<tr>";
											        echo "<td>" . $grupoalerta->grupo_id . "</td>";
											        echo "<td>" . $grupoalerta->fecha . "</td>";
											        echo "<td>" . $grupoalerta->alerta . "</td>";
											        //echo "<td>" . $chofer->licencia . "</td>";
											        //echo "<td>" . $chofer->telefono . "</td>";
											        

											        echo "<td>" ;
													
													echo "<a href='/grupoalertas/" . $grupoalerta->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";

													echo "<a href='/grupoalertas/" . $grupoalerta->id . "' class='btn btn-xs btn-info'>Ver</a> ";


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

									{{ $grupoalertas->links()}}

									</div>
								</div>

							</footer>
						</section>
<?php

		}


	?>	

<script src="js/app.v2.js"></script>

@stop