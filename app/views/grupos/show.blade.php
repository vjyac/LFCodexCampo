@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/grupos') }}">Grupo</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/grupos/create') }}">Crear un nuevo Grupo</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Grupo</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/grupos/' . $grupo->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


						<div class="form-group">
							<label>Grupo</label>
								<div class="form-control input-lg">
									{{ $grupo->grupo }}
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