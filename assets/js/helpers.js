
function administrarTarea(id, accion) {
	jQuery(document).ready(function() {

		// --> Recuperamos la info de la acción solicitada y armamos los datos a enviar en la petición Ajax
		var ajaxType = '';
		var ajaxDatos = new FormData();


		if (accion == "crear") {
		}

		else if (accion == "editar") {
		}

		else if (accion == "eliminar") {
		    var alert_confirmation;
		    alert_confirmation = confirm('¿Eliminar permanentemente la tarea '+id+'?');
		    if (alert_confirmation) {
				ajaxType = 'POST';
				ajaxDatos.append('id',id);
				ajaxDatos.append('accion','eliminar');
		    }
		}

		// --> Se ejecuta la petición Ajax
		jQuery.ajax({
			url: 'process.php',
			data: ajaxDatos,
			type: ajaxType,
			dataType: 'json',
			async: true,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function() {
				jQuery('.spinner-gif').css('display','block');
			},
			success: function(response) {
				if (response.return === true) {
					jQuery('#btn-eliminar-'+response.id).html('Tarea eliminada').addClass('bg-danger').attr('disabled', true);
					jQuery('#btn-editar-'+response.id).attr('disabled', true);
				}
				else {
					alert(response.errores);
				}
			},
			complete: function(jqXHR, estado, error) {
				jQuery('.spinner-gif').css('display','none');
				if (estado == "parsererror") {
					console.log("AJAX terminó de ejecutarse con error. jqXHR: " + jqXHR + ", estado: " + estado + ", error: " + error);
					console.log("Status: "+jqXHR["status"]);
					console.log("ResponseText: "+jqXHR["responseText"]);
					alert('Error AJAX: ' + jqXHR + ', estado: ' + estado + ', error: ' + error);
				}
			}
		});
	});
}
