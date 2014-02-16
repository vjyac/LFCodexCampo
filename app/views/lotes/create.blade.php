@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/lotes') }}">Lotes</a>
		</div>
	</nav>

	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Lotes</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'lotes.store', "autocomplete"=>"off"
, 'class' => 'panel-body wrapper-lg')) }}




				<div class="form-group">
					<label>Lote</label>
					{{ Form::text('lote', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese un lote')) }}
					<?php 

						if ($errors->
					first('lote')) {
					?>
					<span class="badge bg-danger">{{ $errors->first('lote') }}</span>

					<?php
						}
					?></div>

					<div class="form-group">
						<label>Establecimiento</label>
						{{ Form::text('establecimiento', '', array('class' => 'form-control input-lg', 'id' =>'establecimiento', 'placeholder' => 'Ingrese un establecimiento')) }}
						{{ Form::hidden('establecimientos_id' , Input::old('establecimientos_id'), array('id' =>'establecimientos_id')) }}
					</div>
						
				<div class="form-group">
					<label>Superficie M2</label>
					{{ Form::text('superficie_m2', '', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese un superficie en m2')) }}
					<?php 

						if ($errors->
					first('superficie_m2')) {
					?>
					<span class="badge bg-danger">{{ $errors->first('superficie_m2') }}</span>

					<?php
						}
					?></div>



				<div class="form-group">
					<label>Observaciones</label>
					{{ Form::textarea('observaciones', '', array('class' => 'form-control input-lg', 'placeholder' => 'Observaciones')) }}
					<?php 

						if ($errors->
					first('observaciones')) {
					?>
					<span class="badge bg-danger">{{ $errors->first('observaciones') }}</span>

					<?php
						}
					?></div>




				<br>
				{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
			</div>
		</section>
	</div>
</div>


{{ Form::close() }}

<script src="/js/app.v2.js"></script>

<script>

var jq = jQuery.noConflict();
    jq(document).ready( function(){
        

    $("#establecimiento").autocomplete({
		source: "/establecimientos/search",
      	select: function( event, ui ) {
      		$( '#establecimientos_id' ).val( ui.item.id );
      }
  });



});

  
</script>
@stop