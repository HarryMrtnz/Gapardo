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
					$comentario = $inst ['comentario'];
					$puntuacion = $inst ['puntuacion'];
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
							<h5>COMENTARIOS:</h5>
								<p><b>$comentario</b></p>
							<h5>PUNTUACION:<h5>
								<p><b>$puntuacion</b></p>
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