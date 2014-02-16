@extends('layouts.default')

@section('content')


<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/documentostipos') }}">Documentos Tipo</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/documentostipos/create') }}">Crear nueva Documentos tipo</a>
	</ul>
</nav>

		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Documentos Tipo</header>
				<div class="panel-body">
					{{ Form::open(array('url' => '/documentostipos/' . $documentostipo->id, 'class' => 'panel-body wrapper-lg')) }}
					{{ Form::hidden('_method', 'DELETE') }}


						<div class="form-group">
							<label>Documentos Tipo</label>
								<div class="form-control input-lg">
									{{ $documentostipo->documentostipo }}
								</div><br>



						{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>
@stop