<div class="spinner-gif">
	<img src="assets/img/loading.gif" alt="Loading" />
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="assets/js/helpers.js?22"></script>

<script>

	// Escuchamos formularios AJAX
	jQuery(document).ready(function() {

		jQuery('form.ajax').submit(function(e){
			e.preventDefault();
			var datos = jQuery(this).serialize();
			console.log(datos);

			jQuery.ajax({
				url: 'process.php',
				data: datos,
				type: 'POST',
				dataType: 'json',
				async: true,
				beforeSend: function() {
					jQuery('.spinner-gif').css('display','block');
				},
				success: function(response) {
					if (response.return === true) {
						jQuery('#wrapper-msg-success').removeClass('displayNone');
						jQuery('#msg-success ').html(response.msg);
						setTimeout(
							function() {
								window.location.href = 'index.php';
							},7000
						);
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
	});
</script>
