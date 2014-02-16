@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/lotes') }}">Lotes</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/lotes/create') }}">Crear nuevo lotes</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Lote</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/lotes/' . $lote->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}



					<?php
							$establecimiento = establecimiento::find($lote->establecimientos_id);
					?>




				<div class="form-group">
					<label>Lote</label>
							<div class="form-control input-lg">
								{{ $lote->lote }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Establecimiento</label>
							<div class="form-control input-lg">
								{{ $establecimiento->establecimiento }}
							</div><br>
				</div>


				<div class="form-group">
					<label>Superficie m2</label>
							<div class="form-control input-lg">
								{{ $lote->superficie_m2 }}
							</div><br>
				</div>								

				<div class="form-group">
					<label>Observaciones</label>
							<div class="form-control input-lg">
								{{ $lote->observaciones }}
							</div><br>
				</div>								




						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop