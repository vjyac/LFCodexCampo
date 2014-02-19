@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/movimientosganaderias') }}">Movimientos Ganaderia</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/movimientosganaderias/create') }}">Crear nuevo movimientos</a>
	</ul>
</nav>


	<?php


		if (count($movimientosganaderias)>0 )  {

	?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Lote Origen</th>
												<th>Lote Destino</th>
												<th>Grupo</th>
												<th>Tipo Documento</th>
												<th>Nº Documento</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>
											
												<?php

											foreach ($movimientosganaderias as $movimientosganaderia)
												{


														$origenlotes = Lote::find($movimientosganaderia->origenlotes_id);
														$destinolotes = Lote::find($movimientosganaderia->destinolotes_id);
														$grupo = Grupo::find($movimientosganaderia->grupos_id);
														$documentostipo = Documentostipo::find($movimientosganaderia->documentostipos_id);

														echo "<tr>";
												        echo "<td>" . $movimientosganaderia->fecha . "</td>";
												        echo "<td>" . $origenlotes->lote  . "</td>";
												        echo "<td>" . $destinolotes->lote  . "</td>";
												        echo "<td>" . $grupo->grupo . "</td>";
												        echo "<td>" . $documentostipo->documentostipo . "</td>";
												        echo "<td>" . $movimientosganaderia->numero_documento . "</td>";
												        echo "<td>" ;
														
														echo "<a href='/movimientosganaderias/" . $movimientosganaderia->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";

														echo "<a href='/movimientosganaderias/" . $movimientosganaderia->id . "' class='btn btn-xs btn-success'>Ver</a> ";

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

									{{ $movimientosganaderias->links()}}

									</div>
								</div>

							</footer>
						</section>
		<?php

			}

		?>	
<script src="/js/app.v2.js"></script>
@stop