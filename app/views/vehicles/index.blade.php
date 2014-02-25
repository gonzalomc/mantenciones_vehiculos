@extends('templates.default')

@section('breadcrumbs')
	<div class="span9" id="content">
        <div class="row-fluid">
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="breadcrumb">
                        <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <li>
                            <a href="#">Vehículos</a> <span class="divider">/</span>    
                        </li>
                        <li>
                            <a href="#">Lista</a> <span class="divider">/</span> 
                        </li>                 
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop


@section('content')
	<div class="row-fluid">
		<div class="span12">
			<a href="#myAlert" data-toggle="modal" class="btn btn-info">Agregar nuevo vehículo</a>
		</div>

		<!-- ModalBox para agregar nuevo Vehículo -->
		<div id="myAlert" class="modal hide fade">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">&times;</button>
				<h3>Agregar Vehículo</h3>
			</div>
			<div class="modal-body">
				{{ Form::open(array('route'=>'vehicles.store', 'id'=>'form_vehicle')) }}
					{{ Form::label('Patente de Vehículo') }}
					{{ Form::text('patent','',array('id'=>'patent')) }}
					{{ Form::label('Modelo Vehículo') }}
					{{ Form::text('model','',array('id'=>'model'))}}
				{{ Form::close() }}
			</div>
			<div class="row-fluid">
				<div id="validation" style="display:none" class="alert alert-error span8 offset1"></div>
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn btn-primary" href="#" id="add-vehicle">Agregar</a>
				<a data-dismiss="modal" class="btn" href="#">Cancelar</a>
			</div>
			
		</div><!-- Fin ModalBox -->
	</div><br /> 
	<table class="table table-striped table-bordered" id="table_vehicle">
		<thead>
			<tr>
				<th>#</th>
				<th>Patente</th>
				<th>Modelo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($vehicles as $vehicle)
				<tr>
					<td>#</td>
					<td>{{ $vehicle->patent }}</td>
					<td>{{ $vehicle->model }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>


<script>
	$(document).ready(function(){
		$("#add-vehicle").on('click',add_vehicle);
	})

	function add_vehicle(){
		var post_url = document.getElementById("form_vehicle").action;
		var pars = $("#form_vehicle").serialize();
		$.ajax({
			url : post_url,
			type : 'POST',
			data : pars,
			success : function(result){
				if (result['success']){
					// Agregamos el dato ingresado al inicio de la tabla
					$("#table_vehicle").prepend(
					$("<tr><td>"+$("#patent").val()+"</td><td>"+$("#model").val()+"</td><td>"+$("#patent").val()+"</td></tr>"));
					$('#myAlert').modal('hide');
				}
				else{
					$("#validation").html('').fadeIn();
					$.each(result['message'], function(i, item){
						$("#validation").append('<p>*<strong>' + item + '</strong /></p>');
					});
					//console.log(result['message']);
				}
				
			}
		})
		
		return false;
	}
</script>

@stop