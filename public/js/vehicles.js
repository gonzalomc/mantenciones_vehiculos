function add_vehicle(){
	var post_url = "/vehicles";
	var pars = $("#form_vehicle").serialize();
	$.ajax({
		url : post_url,
		type : 'POST',
		data : pars,
		success : function(result){
			if (result['success']){
				// Agregamos el dato ingresado al inicio de la tabla

				$("#table_vehicle").prepend(
				$("<tr><td>#</td><td>"+$("#patent").val()+"</td><td>"+$("#model").val()+"</td></tr>"));
				$('#myAlert').modal('hide');
				$("#message").html("Vehículo ingresado exitosamente")
				.addClass('alert alert-success')
				.fadeIn().delay(3000).fadeOut();
			}
			
			else{
				$("#validation").html('').fadeIn();
				$.each(result['message'], function(i, item){
					$("#validation").append('<p>*<strong>' + item + '</strong /></p>');
				});
				
			}
			
		}
	})
	
	return false;
}

function get_vehicle(){
	id_vehicle = $(this).attr('data-id');
	$.ajax({
		url : "/vehicles/"+id_vehicle,
		type : "GET",
		success : function(result){
			$("#form_editVehicle #patent").val(result["patent"]);
			$("#form_editVehicle #model").val(result["model"]);
		}
	})
}