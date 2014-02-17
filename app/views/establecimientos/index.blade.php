@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/establecimientos') }}">Establecimientos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('establecimientos/create') }}">Crear nuevo establecimiento</a></li>
			<li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                        <i class="fa fa-fw fa-search"></i>
                    </a>
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">

                        	{{ Form::open(array('route' => 'establecimientos.finders', "autocomplete"=>"off", "role"=>"search")) }}

                                <div class="form-group wrapper m-b-none">
                                    <div class="input-group">

                                        {{ Form::text('texto', '', array('class' => 'form-control', 'placeholder' => 'que busco ?')) }}

                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-icon">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </section>
                    </section>
                </li>
                
	</ul>

</nav>


	<?php


		if (count($establecimientos)>0 )  {


?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Establecimiento</th>
												<th>Cliente</th>
												<th>Ciudad</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>
											
												<?php



											foreach ($establecimientos as $establecimiento)
											{
													$clientesproveedor = Clientesproveedor::find($establecimiento->clientesproveedors_id);
													$ciudad = Ciudad::find($establecimiento->ciudads_id);

													echo "<tr>";
											        echo "<td>" . $establecimiento->establecimiento . "</td>";
											        echo "<td>" . $clientesproveedor->clientesproveedor . "</td>";
											        echo "<td>" . $ciudad->ciudad . "</td>";
											        echo "<td>" ;
													
													echo "<a href='/establecimientos/" . $establecimiento->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";

													echo "<a href='/establecimientos/" . $establecimiento->id . "' class='btn btn-xs btn-info'>Ver</a> ";


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

									{{ $establecimientos->links()}}

									</div>
								</div>

							</footer>
						</section>
<?php

		}


	?>	

<script src="/js/app.v2.js"></script>

@stop