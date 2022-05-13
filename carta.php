<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BTrrea - Carta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/carta.css">
    <link rel="icon" href="./media/iconos/BTrrea-Icono.png">    
</head>
<body>
	<div class="bg-gainsboro text-raisin-black">
		<?php include "header.txt"; ?>
		<img src="./media/imgs/carta-cabecera.jpg" class="w-100" alt="comida">
		<main class="py-5 bg-gainsboro">
			<?php
				require './conexion_restaurant.php';
				//1-conexion
				if($conexion = mysqli_connect($servidor, $usuario, $password, $bbdd)){
					mysqli_query($conexion, "SET NAMES 'UTF8'");
					//2- Seleccion BBDD
					if(mysqli_select_db($conexion, $bbdd)){
						//3-definir consulta secciones de menu
						$consulta ='SELECT DISTINCT seccion_menu FROM platos';
						$secciones = array(); //para guardar las secciones
						//4-ejecutar consulta
						$resultado = mysqli_query($conexion, $consulta);
						//5 comprobacion
						if(mysqli_errno($conexion) != 0){
							//hay error
							echo '<p>Nº error: '.mysqli_errno($conexion).'</p><p>Mensaje error: '.mysqli_error($conexion).'</p>';
						}else{
							//no hay error
							//6-guardar las secciones en un array
							$i = 0;
							while($dato = mysqli_fetch_array($resultado)){
								array_push($secciones, $dato['seccion_menu']);
								$i++;
							}
						}
						echo "<h1 class='text-center'>Nuestra carta</h1>";
						//7- para cada seccion coger sus platos				
						for ($j=0; $j < sizeof($secciones); $j++) {
							//8- definir consulta
							$consulta = "SELECT cod_plato, plato, ingredientes, precio, foto, descripcion FROM platos WHERE seccion_menu = '$secciones[$j]';";
							//9- ejecutar consulta
							$rdo = mysqli_query($conexion, $consulta);
							//10- comprobacion
							if(mysqli_errno($conexion) != 0){
								//hay error
								echo '<p>Nº error: '.mysqli_errno($conexion).'</p><p>Mensaje error: '.mysqli_error($conexion).'</p>';
							}else{
								//no hay error
								if($j % 2 == 0){
									echo "<section class='seccion-iz'>
											<div class='container-fluid p-3 rounded'>
												<div class='row'>
													<div class='col-lg-8'>
														<h2>$secciones[$j]</h2>
															<hr class='p-1 w-75 text-dark-liver rounded me-auto opacity-75'>
															<div class='accordion text-raisin-black' id='acordion$secciones[$j]'>";
								}else{
									echo "<section class='seccion-der bg-raisin-black'>
											<div class='container-fluid p-3 rounded'>
												<div class='row flex-row-reverse'>
													<div class='col-lg-8'>
														<h2 class='text-end me-5'>$secciones[$j]</h2>
														<hr class='p-1 w-75 text-platinum rounded ms-auto opacity-75'>
														<div class='accordion ms-auto p-3' id='acordion$secciones[$j]'>";
								}
								while($dto = mysqli_fetch_array($rdo)){
									echo "<div class='accordion-item border-0 w-100 plato'>
					                        <h5 class='accordion-header m-0' id='heading$dto[cod_plato]'>
					                            <button class='btn-plato w-100 border-0' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$dto[cod_plato]' aria-expanded='false' aria-controls='collapse$dto[cod_plato]'>
					                                <span class='row justify-content-between w-100'>
					                                    <span class='col-9 ellipsis text-start mx-auto'>$dto[plato]</span>
					                                    <span class='col-2 text-end me-1'>$dto[precio]€</span>
					                                </span>
					                            </button>
					                        </h5>
					                        <div id='collapse$dto[cod_plato]' class='accordion-collapse collapse' aria-labelledby='#heading$dto[cod_plato]' data-bs-parent='#acordion$secciones[$j]'>
					                            <div class='accordion-body'>
					                                <div class='row'>
					                                    <div class='col-md-4'><img src='./media/imgs/platos/$dto[foto]' alt='Foto de $dto[plato]'></div>
					                                    <div class='col-md-8'>
					                                        <p class='display-10 fw-bold'>Ingredientes</p>";
									    			if($dto['ingredientes'] != ""){
									        			echo "<p>$dto[ingredientes].</p>";
									        		}
									        		echo "<p class='display-10 fw-bold'>Descripción</p>";
									    			if($dto['descripcion'] == ""){
									    				echo "<p>N/D</p>";
									    			}else{
										    			echo $dto['descripcion'];
									    			}
								    			echo "</div>
								    			</div>
								    	  	</div>
							    	  	</div>
									</div>";
								}

									echo "	</div>
										</div>
										<div class='col-lg-4'>
							                <img src='./media/imgs/Lluerna1.jpg' class='img-fluid my-auto' alt='Lluerna'>
							            </div>
						            </div>
								</div>
							</section>";
							}
						}
					}
					mysqli_close($conexion);
				}
			?>
		</main>
		<?php include "footer.txt" ?>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>