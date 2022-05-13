<!-- <?php
	define('SITE_KEY', '6LdRkrMfAAAAAF5xE84WsTUGg3pN_8K9UThrqOKF'); 
?> -->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bterrea - Contactanos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/otros.css">
    <link rel="icon" href="./media/iconos/BTrrea-Icono.png">
	<!-- <script src='https://www.google.com/recaptcha/api.js?render=SITE_KEY'></script>
 --></head>
<body>
	<div class="bg-platinum">
		<?php include "header.txt";?>
		<img src="./media/imgs/cabecera-contactos.png" class="img-fluid" alt="imagen monte Fugi">
		<main class="my-5 p-5 bg-raisin-black text-gainsboro">
			<div class="row w-100">
				<section class="d-flex align-items-center col-lg-7 me-lg-5 mb-5">
					<div class="mensaje-feedback">
						<?php
							// require "./validar_captcha.php";
		                    if(isset($_GET['rec'])){
		                    	if (isset($_GET['env'])) {
				            		$msg = '<h4 class="text-success rounded-pill text-center">¡Mensaje enviado!</h4>';
								}else{
							   		$msg = '<h4 class="text-danger rounded-pill text-center">Fallo en el envio</h4>';
		                    	}
		                    	echo "$msg";
							}
	                    ?>
					</div>
					<div>				
						<p class="text-center"></p>
						<h1>Nuestros contactos</h1>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, numquam. Aut, quidem distinctio ullam, id quis ducimus, blanditiis autem fugit odit, corrupti exercitationem dolorum libero hic! Autem doloremque placeat neque.</p>
						<p><svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg> +34 698 28 35 33</p>
						<p><svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/></svg> bterra@gmail.com</p>
					</div>
				</section>
				<section class="col-lg-4 p-4">
					<h2 class="titulo-form text-center">Formulario de correo</h2>
					<form class='row w-100 me-0 gx-0' action='./send_mail_hp.php' method='post'>
						<div class='col-lg-12'>
							<div class='row'>
						    	<div class='col-lg-7 mb-3'>
						            <label for='nombre' class='form-label h5'>Nombre</label>
						            <input type='text' name='nombre_txt' maxlength='30' class='form-control' id='nombre' placeholder='Nombre' required>
						        </div>
						    	<div class='col-lg-5 mb-3'>
						            <label for='dni' class='form-label h5'>NIF / DNI</label>
						            <input type='text' name='dni_txt' maxlength='9' minlength="9" class='form-control' id='dni' placeholder='NIF' required>
						        </div>
							</div>
						</div>
				        <div class='col-lg-12 mb-3'>
				            <label for='nombre' class='form-label h5'>Apellidos</label>
				            <input type='text' name='apellidos_txt' maxlength='50' class='form-control' id='nombre' placeholder='Apellidos' required>
				        </div>
						<div class='col-lg-12 mb-3'>
						    <label for='email' class='form-label h5'>Tu email</label>
						    <input type='email' name='mail' maxlength='100' class='form-control' id='email' placeholder='micasa@tucasa.com' required>
						</div>
						<div class='col-lg-12 mb-4'>
						    <label for='mensaje' class='form-label h5'>Mensaje</label>
						    <textarea class='form-control' name='mensaje_txt' maxlength='800' id='mensaje' placeholder='Mensaje' required></textarea>
						</div>
						<div class='col-lg-10 mx-auto'>
						    <input type='submit' id="envio" name='enviado_btn' value="Envio" class='btn text-center w-100 fs-6 fw-bold rounded-pill bg-oxford-blue text-platinum'>
							<!-- <input type="hidden" name="recaptcha_response" id="recaptchaResponse"> -->
						</div>
					</form>
				</section>
			</div>
		</main>

		<?php include "footer.txt"; ?>
	</div>
<!-- 	<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('SITE_KEY', {action: 'submit'})
		.then(function(token) {
			var recaptchaResponse = document.getElementById('recaptchaResponse');
			recaptchaResponse.value = token;
		});
	});
	</script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>