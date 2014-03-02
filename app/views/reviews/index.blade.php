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
                            <a href="#">Manteciones</a> <span class="divider">/</span>    
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
			<a href="#myAlert" data-toggle="modal" class="btn btn-info">Agregar nueva mantención</a>
		</div>

		<!-- ModalBox para agregar nueva mantención -->
		<div id="myAlert" class="modal hide fade">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">&times;</button>
				<h3>Ingresar nueva Manteción</h3>
			</div>
			<div class="modal-body">
				{{ Form::open(array('route'=>'reviews.store', 'id'=>'form_review')) }}
					{{ Form::label('Seleccione Vehículo') }}
					<select name="vehicle_id" id="vehicles"></select>
					{{ Form::label('Fecha de Manteción')}}
					{{ Form::text('date', '', array('id'=>'datepicker')) }}
					{{ Form::label('Descripción') }}
					{{ Form::textarea('description','')}}

				{{ Form::close() }}
			</div>
			<div class="row-fluid">
				<div id="validation" style="display:none" class="alert alert-error span8 offset1"></div>
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn btn-primary" href="#" id="add-review">Registrar Mantención</a>
				<a data-dismiss="modal" class="btn" href="#">Cancelar</a>
			</div>
			
		</div><!-- Fin ModalBox -->
		<br /><br /><br />
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Estado</th>
					<th>Vehículo</th>
					<th>Fecha Mantención</th>
					<th>Descripción</th>					
				</tr>
			</thead>
			<tbody>
				@foreach($reviews as $review)
					<tr>
						<td><span class="label label-warning">Pendiente</span></td>
						<td>{{ $review->vehicle->patent }}</td>
						<td>{{ $review->date }}</td>
						<td>{{ $review->description }}</td>						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

<script>
	$(document).ready(function(){
		getVehicles();
		$("#add-review").on('click', addReview);
		var picker = new Pikaday({ 
			field: document.getElementById('datepicker'),
			firstDay: 1,
	        minDate: new Date('2000-01-01'),
	        maxDate: new Date('2020-12-31'),
	        yearRange: [2000,2020],
	        format : "DD-MM-YYYY"

		});
	});

	function getVehicles(){
		var url = "{{ URL::route('vehicles.index')}}";
		$.ajax({
			type : "GET",
			url : url,
			success : function(result){
				$.each(result, function(key, value){
					$("#vehicles").append(
						"<option value="+value.id+">"+value.patent+"-"+value.model+"</option>"
						);
				})
			}
		});
	};

	function addReview(){
		var url = "{{ URL::route('reviews.store') }}";
		var pars = $("#form_review").serialize();
		$.ajax({
			type : "POST",
			url : url,
			data : pars,
			success: function(result){
				console.log(result);
			}


		})
	}
</script>
@stop