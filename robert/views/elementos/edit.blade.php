@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<div class="row">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/elementos') }}">Elementos</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('elementos/create') }}">Crear un nuevo Elemento</a>
	</ul>
</nav>


		<div class="col-sm-6">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">{{ $title }}</header>
				<div class="panel-body">
					{{ Form::open(array('url' => URL::to('/elementos/' . $elemento->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}


					<?php
								$grupo = grupo::find($elemento->grupos_id);
							?>

							<div class="form-group">
							<label>Grupo_id</label>
							{{ Form::text('grupo', '', array('class' => 'form-control input-lg', 'id' =>'grupo', 'placeholder' => 'Ingrese un grupo_id')) }}
							{{ Form::hidden('grupo_id' , Input::old('grupo_id'), array('id' =>'grupo_id')) }}			

							<!--
						<div class="form-group">
							<label>Grupo_id</label>
							{{ Form::text('grupo_id', $elemento->grupo_id, array('class' => 'form-control input-lg', 'placeholder'
							 => 'Ingrese un grupo_id')) }}<br></div>
							<?php 

							if ($errors->first('grupo_id')) {
								?>
									<span class="badge bg-danger">{{ $errors->first('grupo_id') }}</span>
								<?php
							}
							?>							 
							-->




						<div class="form-group">



						{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
				</div>
			</section>
		</div>
	</div>
<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    $("#grupo").autocomplete({
		source: "/grupos/search",
      	select: function( event, ui ) {
      		$( '#grupos_id' ).val( ui.item.id );
      }
  });


});

  
</script>

@stop