@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/elementos') }}">Elemento</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/elementos/create') }}">Crear un nuevo Elemento</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Elemento</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/elementos/' . $grupo_id->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


						<?php
								$grupo = grupo::find($elemento->grupos_id);
							?>

							<div class="form-group">
								<label>Grupo_id</label>
									<div class="form-control input-lg">
											{{ $grupo->grupo }}
									</div>
							</div>

						<!--	
						<div class="form-group">
							<label>Grupo_id</label>
								<div class="form-control input-lg">
									{{ $elemento->grupo_id }}
								</div><br>
							<div class="form-group">
						-->


						<div class="form-group">


						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop