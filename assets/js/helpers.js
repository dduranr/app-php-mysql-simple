
function administrarTarea(id, accion) {
	jQuery(document).ready(function() {

		// --> Recuperamos la info de la acción solicitada y armamos los datos a enviar en la petición Ajax
		var ajaxDatos = new FormData();

		if (accion == "editar") {
		}

		else if (accion == "eliminar") {
		    var alert_confirmation;
		    alert_confirmation = confirm('¿Eliminar permanentemente la tarea con ID '+id+'?');
		    if (alert_confirmation) {
				ajaxDatos.append('id',id);
				ajaxDatos.append('accion','eliminar');
		    }
		    else {
		    	return false;
		    }
		}

		// --> Se ejecuta la petición Ajax
		jQuery.ajax({
			url: 'process.php',
			data: ajaxDatos,
			type: 'POST',
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
					if (accion == "crear") {
						jQuery('#wrapper-msg-success').removeClass('displayNone');
						jQuery('#msg-success ').html(response.msg);
					}
					else if (accion == "eliminar") {
						jQuery('#btn-eliminar-'+response.id).html(response.msg).addClass('bg-danger').attr('disabled', true);
						jQuery('#btn-editar-'+response.id).attr('href', 'javascript:;');
					}
				}
				else {
					alert(response.msg);
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
