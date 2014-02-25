/*

Funciones para obtener o ingresar datos de 
vehículos

*/

function getVehicles(url){
	$.ajax({
		type : "GET",
		url : url, 
		success : function(result){
			$.each(result, function(key, value){
				return value;
			});
		},
		error: function(e){
			return "Error";
		},
	});
}