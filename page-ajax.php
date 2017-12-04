<?php
/*
 * You need to create a Wordpress page with the slug 'ajax'
 * in order for this page to be called successfully.
 */

get_template_part( 'php/PHPMailer-master/PHPMailerAutoload');

get_template_part( 'php/partials/google', 'recaptcha' );

$from = 'no-reply@cloudcars.mx';
$main_email = 'talento@cloudcars.mx';
$main_name = 'Talento Cloud Cars';

$developer_email = 'daniel@jaestudio.net';
$developer_name = 'Daniel Franco';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
if ( isset($_POST['ajax']) ) {
	
	switch ($_POST['ajax']) {
		case 'contacto':
			if (recaptcha($_POST['captcha'])) {
				$mail->setFrom($from, $_POST['nombre']);
				$mail->addAddress($main_email, $main_name);
				$mail->addBCC($developer_email, $developer_name);
				$mail->addReplyTo($_POST['email'], $_POST['nombre']);

				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Contacto desde sitio web';
				$mail->Body    = '<p>Nombre: '. $_POST['nombre'] .'</p><p>Teléfono: '. $_POST['telefono'] .'</p><p>Email: '. $_POST['email'] .'</p><p>Asunto: '. $_POST['asunto'] .'</p><p>Comentarios: '. $_POST['comentarios'] .'</p>';

				if(!$mail->send()) {
				    $feedback = 'No se pudo enviar el mensaje. Error: ' . $mail->ErrorInfo;
				    $success = false;
				} else {
				    $feedback = '¡Gracias! Pronto nos pondremos en contacto con usted.';
				    $success = true;
				}

				header('Content-Type: application/json');
				echo json_encode( array(
					'success' => $success,
					'feedback' => $feedback
				));
			} else {
				header('Content-Type: application/json');
				echo json_encode( array(
					'success' => false,
					'feedback' => 'Ocurrió un error envíando la información del captcha.'
				));
			}

			break;
	}

}

?>
