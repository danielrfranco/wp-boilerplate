function isEmail(email) {
  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  	return regex.test(email);
}

(function($) {
	
	$('#formContacto #enviar').click(function(event) {

		event.preventDefault();

		//Verificar que estén llenos los campos
		if ( $('#nombre').val() == '' || $('#email').val() == '' || $('#telefono').val() == '' || $('#asunto').val() == '' || $('#comentarios').val() == '' || $('#formContacto .g-recaptcha-response').val().length < 1) {

			//Necesitas un elemento con la clase feedback en donde mostrar mensajes obviamente
			$('.feedback').empty();
			$('.feedback').removeClass('alert-info alert-success');
			$('.feedback').addClass('d-inline-block alert-danger');
			$('.feedback').append('Por favor llene todos los campos.');
		}

		else if ( !isEmail($('#email').val()) ) {
			$('.feedback').empty();
			$('.feedback').removeClass('alert-info alert-success');
			$('.feedback').addClass('d-inline-block alert-danger');
			$('.feedback').append('Por favor use un formato correcto para el email.');
		}

		else {

			var nombre = $('#nombre').val();
			var telefono = $('#telefono').val();
			var email = $('#email').val();
			var asunto = $('#asunto').val();
			var comentarios = $('#comentarios').val();
			var captcha = $('#formContacto .g-recaptcha-response').val();

			console.log('Todos los campos llenos.\nProcedemos a enviar el formulario.');
			
			$('.feedback').empty();
			$('.feedback').removeClass('alert-danger alert-success');
			$('.feedback').addClass('d-inline-block alert-info');
			$('.feedback').append('<i class="fa fa-spinner fa-spin fa-fw"></i> Estamos enviando su mensaje.');


			$.ajax({
				url : '/ajax/', //Or the url to your ajax wordpress page. Check 'page-ajax.php'
				type : 'POST',
				data : {
					'ajax': 'contacto',
					'nombre': nombre,
					'telefono': telefono,
					'email': email,
					'asunto': asunto,
					'comentarios': comentarios,
					'captcha': captcha
				},
				dataType : 'json',
				success: function(data) {
					$('.feedback').empty();
					if (data.success) {
						$('.feedback').removeClass('alert-info');
						$('.feedback').addClass('d-inline-block alert-success');
					} else {
						$('.feedback').removeClass('alert-info alert-success');
						$('.feedback').addClass('d-inline-block alert-danger');
					}
					console.log(data.feedback);
					$('.feedback').append(data.feedback);
				}
			});

		}

	});

})(jQuery);