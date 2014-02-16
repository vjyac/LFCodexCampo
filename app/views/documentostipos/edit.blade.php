@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/documentostipos') }}">Documentos tipos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/documentostipos/create') }}">Crear nuevo Documento tipo</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('/documentostipos/' . $documentostipo->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}



						<div class="form-group">
							<label>Documento tipo</label>
							{{ Form::text('documentostipo', $documentostipo->documentostipo, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese una documento tipo')) }}<br></div>
							<?php 

							if ($errors->first('documentostipo')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('documentostipo') }}</span>
								<?php
							}
							?>							 
						




						{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    $("#ciudad").autocomplete({
		source: "/ciudads/search",
      	select: function( event, ui ) {
      		$( '#ciudads_id' ).val( ui.item.id );
      }
  });


});

  
</script>
@stop