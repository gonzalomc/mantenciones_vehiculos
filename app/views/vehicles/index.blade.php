@extends('templates.default')

@section('content')
	<div class="row-fluid">
		<h3>Lista de Vehículos</h3><hr />
		<div class="span12 text-right">
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
				<div id="validation" style="display:none" class="alert alert-error span12 "></div>
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn btn-primary" href="#" id="add-vehicle">Agregar</a>
				<a data-dismiss="modal" class="btn" href="#">Cancelar</a>
			</div>
			
		</div><!-- Fin ModalBox -->


		<!-- ModalBox para editar vehículo existente -->
		<div id="editVehicleModal" class="modal hide fade">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">&times;</button>
				<h3>Editar Vehículo</h3>
			</div>
			<div class="modal-body">
				{{ Form::open(array('route'=>'vehicles.edit', 'id'=>'form_editVehicle'))}}
					{{ Form::open(array('route'=>'vehicles.store', 'id'=>'form_vehicle')) }}
					{{ Form::label('Patente de Vehículo') }}
					{{ Form::text('patent','',array('id'=>'patent')) }}
					{{ Form::label('Modelo Vehículo') }}
					{{ Form::text('model','',array('id'=>'model'))}}
				{{ Form::close() }}
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn btn-primary" href="#" id="add-vehicle">Editar datos</a>
				<a data-dismiss="modal" class="btn" href="#">Cancelar</a>
			</div>
		</div>
		<!-- Fin Modal -->
	</div><br /> 
	<div id="message" style="display:none"></div>
	<table class="table table-striped table-bordered" id="table_vehicle">
		<thead>
			<tr>
				<th>#</th>
				<th>Patente</th>
				<th>Modelo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($vehicles as $vehicle)
				<tr>
					<td>#</td>
					<td>{{ $vehicle->patent }}</td>
					<td>{{ $vehicle->model }}</td>
					<td><a href="#editVehicleModal" data-toggle="modal" class="btn btn-warning btn-small get-vehicle" data-id="{{ $vehicle->id }}"><i class="icon-edit"></i></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>


<script>
	$(document).ready(function(){
		$("#add-vehicle").on('click',add_vehicle);
		$(".get-vehicle").on('click', get_vehicle);
	})
</script>
<script src="js/vehicles.js"></script>

@stop