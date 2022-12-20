<main id="carrito">
    <div class="carrito">
		<h3>CARRITO DE COMPRAS</h3>
			<?php
				foreach ($verCarrito as $carrito) {
					$nombre = $carrito['nombre_instrumento'];
					$foto = $carrito['foto'];
					$precio = $carrito['precio'];
					$cantidad = $carrito['cantidad'];
					$marca = $carrito['marca'];
					//$subtotal = $carrito ['subtotal'];
					//$total = $carrito ['total'];
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
									<td class='cant'>

										<form action='carrito/cambiarCantidad'  method='post' name ='cant'>
											
											<select class = 'form-control' name = ''>
						
												<option value='1'>x 1</option>
												<option value='2'>x 2</option>
												<option value='3'>x 3</option>
												<option value='4'>x 4</option>
												<option value='5'>x 5</option>
												<option value='6'>x 6</option>
												<option value='7'>x 7</option>
												<option value='8'>x 8</option>
												<option value='9'>x 9</option>
												<option value='10'x>1 0</option>

											</select>
						
											<input type='submit' value='cambiar' onclick='valida_envia()'>
						
										</form>
									</td>
									<td class='subtotal'>$$subtotal</td>
                                    <td class='del'> <a href='carrito/eliminar/idInstrumento'>
                                        <img src='public/img/carrito_menos.png' alt='eliminar_producto'></a></td>
										
								</tr>

							</table>

						</div>
						";
					}		
					echo"<hr>

					<h4>TOTAL: $$total</h4>";
				?>
			<div class="btns">
				<a href="producto">← VOLVER</a>
				
				<a href='https://www.mercadopago.com.ar'>COMPRAR
					<img src='public/img/pagar.png' alt='pagar'></a>

				<a href='carrito/vaciar'>VACIAR CARRITO
				<img src='public/img/delete.png' alt='delete'></a>


			</div>
		</div>

</main>