@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/movimientomotivos') }}">Movimiento motivo</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/movimientomotivo/create') }}">Crear un nuevo Movimiento motivo</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Movimiento motivo</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/movimientomotivos/' . $movimientomotivo->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


						<div class="form-group">
							<label>Movimiento Motivo</label>
								<div class="form-control input-lg">
									{{ $movimientomotivo->movimientomotivo }}
								</div><br>
							<div class="form-group">



						<div class="form-group">


						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop