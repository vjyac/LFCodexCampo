@extends('layouts.default')


@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />

<div class="row">


	<div class="col-sm-6">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">{{ $title }}</header>
			<div class="panel-body">

	{{ Form::open(array('route' => 'movimientosganaderias.reportecaravanas', "autocomplete"=>"off"
, 'class' => 'panel-body wrapper-lg')) }}
								

				          @if (isset($flash_message))
				          <div class="alert alert-warning">{{ $flash_message }}</div>
				          @endif


						<div class="form-group">
							<label>Cliente proveedor</label>
							{{ Form::text('clientesproveedor', '', array('class' => 'form-control input-lg', 'id' =>'clientesproveedor', 'placeholder' => 'Ingrese un clientesproveedor')) }}
							{{ Form::hidden('clientesproveedors_id' , Input::old('clientesproveedors_id'), array('id' =>'clientesproveedors_id', 'name' =>'clientesproveedors_id')) }}	 
						</div>	 

						<?php if ($errors->first('clientesproveedors_id')) { ?>
								<span class="badge bg-danger">{{ $errors->first('clientesproveedors_id') }}</span>
						<?php } ?>

						<div class="form-group">
							<label>Establecimiento</label>
							{{ Form::text('establecimiento', '', array('class' => 'form-control input-lg', 'id' =>'establecimiento', 'placeholder' => 'Ingrese un establecimiento')) }}
							{{ Form::hidden('establecimientos_id' , Input::old('establecimientos_id'), array('id' =>'establecimientos_id')) }}	 
						</div>	 

						<?php if ($errors->first('establecimientos_id')) { ?>
								<span class="badge bg-danger">{{ $errors->first('establecimientos_id') }}</span>
						<?php } ?>

						<div class="form-group">
							<label>Lote</label>
							{{ Form::text('lote', '', array('class' => 'form-control input-lg', 'id' =>'lote', 'placeholder' => 'Ingrese un lote')) }}
							{{ Form::hidden('lotes_id' , Input::old('lotes_id'), array('id' =>'lotes_id')) }}	 
						</div>	 

						<?php if ($errors->first('lotes_id')) { ?>
								<span class="badge bg-danger">{{ $errors->first('lotes_id') }}</span>
						<?php } ?>

								

				<br>
				{{ Form::submit('Buscar movimientos', array('class' => 'btn btn-primary')) }}

				{{ Form::close() }}
			</div>
		</section>
	</div>
</div>


<script src="/js/app.v2.js"></script>

<script>
	var jq = jQuery.noConflict();
    jq(document).ready( function(){

 
    $("#clientesproveedor").autocomplete({
		source: '/clientesproveedors/search',
      	select: function( event, ui ) {
      		$( '#clientesproveedors_id' ).val( ui.item.id );
      }
  });


$('#establecimiento').autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "/establecimientos/searchs",
               dataType: "json",
          data: {
            term : request.term,
            id : $('#clientesproveedors_id').val()
          },

		success: function (data) {
		                response($.map(data, function(v,i){
		                	$( '#establecimientos_id' ).val( v.id );
	                        return {
	                                label: v.value,
	                                value: v.value
	                               };

		                }));
		            }
        });
      }
  });


$('#lote').autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "/lotes/search",
               dataType: "json",
          data: {
            term : request.term,
            id : $('#establecimientos_id').val()
          },
          success: function(data) {
            response(data);
          }
        });
      }
  });





});

  
</script>

<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>

@stop