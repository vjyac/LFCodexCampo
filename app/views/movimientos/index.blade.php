@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/movimientos') }}">Movimientos Forestacion</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/movimientos/create') }}">Crear nuevo movimientos</a>
	</ul>
</nav>


	<?php


		if (count($movimientos)>0 )  {


?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Lote</th>
												<th>Tipo Documento</th>
												<th>Nº Documento</th>
												<th>Importe Total</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>
											
												<?php

											foreach ($movimientos as $movimiento)
												{

														$lote = lote::find($movimiento->lotes_id);
									                	$establecimiento = establecimiento::find($lote->establecimientos_id);
									                	$clientesproveedor = clientesproveedor::find($establecimiento->clientesproveedors_id);

														$documentostipo = documentostipo::find($movimiento->documentostipos_id);

														echo "<tr>";
												        echo "<td>" . $movimiento->fecha . "</td>";
												        echo "<td>" . $lote->lote  . ', ' . $establecimiento->establecimiento  . ', ' . $clientesproveedor->clientesproveedor . "</td>";
												        echo "<td>" . $documentostipo->documentostipo . "</td>";

												        echo "<td>" . str_pad($movimiento->numero_documento, 12, '0', STR_PAD_LEFT) . "</td>";
												        echo "<td>" . $movimiento->importe_total . "</td>";
												        echo "<td>" ;
														
														echo "<a href='/movimientos/" . $movimiento->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";

														echo "<a href='/movimientos/" . $movimiento->id . "' class='btn btn-xs btn-success'>Ver</a> ";

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

									{{ $movimientos->links()}}

									</div>
								</div>

							</footer>
						</section>
		<?php

			}

		?>	
<script src="/js/app.v2.js"></script>
@stop