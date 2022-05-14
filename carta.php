<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BTrrea - Carta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/generales.css">
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
						echo "<h1 class='text-center p-3 bg-oxford-blue text-platinum'>Nuestra carta</h1>";
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
								//logica para que las secciones de menu en indices pares sea claro y en impares oscuro 
								if($j % 2 == 0){
									//$j es par -- saco tags oportunos(fondo oscuro)
									$lado = "seccion-iz";
									$color = /*"text-gainsboro"*/"text-dark-liver";
									$bgcolor = /*"bg-raisin-black"*/"bg-gainsboro";
									$flexdir = "";
									$hover = "bg-shadow-brighter";
									
								}else{
									//caso contrario (fondo claro)
									$lado = "seccion-der";
									$color = "text-gainsboro"/*"text-dark-liver"*/;
									$bgcolor = "bg-raisin-black" /*"bg-gainsboro"*/;
									$flexdir = "flex-row-reverse";
									$hover = "bg-shadow-darker";
								}

								echo "<section class='$bgcolor $hover'>
										<div class='container-fluid p-3 rounded'>
											<div class='row $flexdir'>
												<div class='col-lg-8'>
													<div class='$lado'>
														<h2 class='$color'>$secciones[$j]</h2>
														<hr class='p-1 w-75 $color rounded opacity-75'>
														<div class='accordion w-100 $bgcolor p-3' id='acordion$secciones[$j]'>";

								//Mientras se saque un plato en la seccion actual de $rdo, se añadira como elemento al acordeon
								while($dto = mysqli_fetch_array($rdo)){
									echo "<div class='accordion-item border-0 border-bottom-1 plato'>
					                        <h5 class='accordion-header m-0' id='heading$dto[cod_plato]'>
					                            <button class='plato-btn $hover border-0' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$dto[cod_plato]' aria-expanded='false' aria-controls='collapse$dto[cod_plato]'>
					                                <span class='row justify-content-between'>
					                                    <span class='col-9 $color ellipsis text-start mx-auto'>$dto[plato]</span>
					                                    <span class='col-2 $color text-end me-1'>$dto[precio]€</span>
					                                </span>
					                            </button>
					                        </h5>
					                        <div id='collapse$dto[cod_plato]' class='accordion-collapse collapse' aria-labelledby='#heading$dto[cod_plato]' data-bs-parent='#acordion$secciones[$j]'>
					                            <div class='accordion-body $hover'>
					                                <div class='row'>
					                                    <div class='col-md-5 p-3'><img src='./media/imgs/platos/$dto[foto]' class'img-fluid' alt='Foto de $dto[plato]'></div>
					                                    <div class='col-md-7 $color'>
					                                    	<div class ='ms-3'>
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
							    	  	</div>
									</div>";
								}
								// se añade una foto a cada seccion
								echo "			</div>
											</div>
										</div>
										<div class='col-lg-4 bloque-centrado'>
											<div class='rounded'>													
							                	<img src='./media/imgs/Lluerna1.jpg' class='img-fluid img-shadow rounded' alt='Lluerna'>
											</div>	
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