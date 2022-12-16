	<main id="ficha">		
									
		<div class="ficha">

			<?php	
				foreach ($mostrarDetalle as $inst) {
					$idInstrumento = $inst ['id_instrumento'];
					$nombreInstrumento = $inst ['nombre_instrumento'];
					$marca = $inst ['marca'];
					$descripcion = $inst ['descripcion'];
					$detalle = $inst ['detalle'];
					$precio = $inst ['precio'];
					$cantidad = $inst ['cantidad'];
					$foto = $inst ['foto'];

					echo" 
						<h3>$nombreInstrumento</h3>
						<div class='fichaimg'> <img src='../public/fotitos/$foto' alt='$nombreInstrumento'></div>
							<div class='info'><h5>MARCA:</h5>
								<p>$marca</p>
							<h5>DESCRIPCIÓN:</h5>
								<p>$descripcion</p>
							<h5>DETALLE:</h5> 
								<p>$detalle</p>
							<h5>CANTIDAD DISPONIBLE:</h5>
								<p>$cantidad</p>
							<h5>PRECIO CONTADO:</h5>
								<h5><b>$$precio</b></h5>		
						</div>
					";
				}
			
			?>

		</div>

		<div class="calificacion">
			<p>DEJANOS TU OPINION SOBRE EL PRODUCTO:</p>
			<form class="calificar" method="post" action="calificar" name="calificar">
                <div class="puntuacion"> 
					<input id="radio1" type="radio" name="puntuacion" value="5">
						<label for="radio1">★</label>
					<input id="radio2" type="radio" name="puntuacion" value="4">
						<label for="radio2">★</label>
					<input id="radio3" type="radio" name="puntuacion" value="3">
						<label for="radio3">★</label>
					<input id="radio4" type="radio" name="puntuacion" value="2">
						<label for="radio4">★</label>
					<input id="radio5" type="radio" name="puntuacion" value="1">
						<label for="radio5">★</label>
				</div>
                <div><input class="form-control" type="text" placeholder="Comentá acá pibe:" name="comentario" required/></div>
                <div><input type="submit" id="boton4" value="Enviar" onclick="valida_envia()"></div>
            </form>

		</div>
		
		<div class="comentarios">
			<?php
				foreach ($verCalificacion as $calificacion) {
					//$idCalificacion = $calificacion ['id_calificacion'];
					$nombreUsuario = $calificacion ['nombre_usuario'];
					$puntuacion = $calificacion ['puntuacion'];
					$comentario = $calificacion ['comentario'];
					//$fecha = $calificacion ['fecha'];
					
					echo "
						<div>
							<table class='tabla-calif'>
								<tr>
									<td class='nombre'><img src='../public/img/logo_perfil.png' alt='usuario'> $nombreUsuario</td>
									<td class='estrella'>$puntuacion ★</td>
									<td class='comentario'>$comentario</td>
									<td>fecha_comentario</td>
								</tr>
							</table>
						</div>
					";
				}		
			?>
		</div>

		<div class="back">
			<ul>
				<a href="../producto"> VOLVER</a>
			</ul>
		</div>

	</main>