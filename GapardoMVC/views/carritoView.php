<main id="carrito">
    <div class="carrito">
		<h3>CARRITO DE COMPRAS</h3>
		<?php
			$total = 0;
			$cantidad = 0;
				
			foreach ($verCarrito as $carrito) {
				$idInstrumento = $carrito ['id_instrumento'];
				$nombre = $carrito['nombre_instrumento'];
				$foto = $carrito['foto'];
				$precio = $carrito['precio'];
				$marca = $carrito['marca'];
				
				$cantidad = 1;
				$subtotal = $precio * $cantidad;
				$total = $total + $subtotal;

				echo "
					<div>
						<table class='tabla-carrito'>
							<tr>
								<td class='foto'> <img src='public/fotitos/$foto' alt='$nombre'></td>
								<td class='nombre'> $nombre</td>
								<td class='marca'> $marca</td>
								<td class='precio'> $$precio</td>

								<td class='del'> 
									<a href='carrito/eliminar?id=$idInstrumento'>
									<img src='public/img/carrito_menos.png' alt='eliminar_producto'>
								</a></td>
									
							</tr>
						</table>
					</div>
				";
			}		


			if ($cantidad == 0) {
				
				echo "<h4>NO TENES PRODUCTOS EN TU CARRITO</h4>";
			}else{
				
				foreach ($contar as $carrito) {
					$suma = $carrito['cantidad'];
					
					echo "<hr> <h4>TENES $suma PRODUCTOS DENTRO DEL CARRITO.<br><br>TOTAL: $$total</h4>";
				}
			}
		?>

		<div class="btns">
			<a href="producto">← VOLVER</a>

			<a href='carrito/vaciar'>VACIAR CARRITO
			<img src='public/img/delete.png' alt='delete'></a>
			
			<a href='https://www.mercadopago.com.ar'>COMPRAR
				<img src='public/img/pagar.png' alt='pagar'></a>
		</div>
	</div>

</main>