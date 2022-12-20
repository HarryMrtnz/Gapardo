    <main id="productos">
        <div>    
            <div class="productos">
                <h1>PRODUCTOS</h1>

                <div>
                    <a href="producto?tipo=1#productos"> <!-- Filtro para instrumentos tipo cuerda. -->
                    <img src="public/img/cuerdas.jpg" alt="cuerdas" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto?tipo=2#productos"> <!-- Filtro para instrumentos tipo viento. -->
                    <img src="public/img/vientos.jpg" alt="vientos" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto?tipo=3#productos"> <!-- Filtro para instrumentos tipo percusion. -->
                    <img src="public/img/percusion.jpg" alt="percusion" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto?tipo=4#productos"> <!-- Filtro para otro tipo instrumentos o accesorios. -->
                    <img src="public/img/otros.jpg" alt="otros" class="img-fluid"></a>                
                </div>

                <div>
                    <div id="cates" class="categorias">

                        <ul><h3>CATEGORIAS</h3>
                
                            <?php

                                for ($i=0; $i < count($lista); $i++) { 
                                    $idCategoria = $lista[$i]['id_categoria'];
                                    $nombreCategoria = $lista[$i]['nombre_categoria'];

                                    echo "<li>
                                            <a href='producto?categoria=$idCategoria#productos'>$nombreCategoria</a>
                                        </li>";
                                }
                            ?>

                        </ul>
                    </div>

                    <ul class="miCarrito">

                        <li>
                            <a href="carrito">
                                <img src="public/img/carrito.png" alt="carrito">MI CARRITO
                                <?php echo ""?>
                            </a>
                        </li>

                    </ul>
                    
                </div>

                <div class="prods">

                    <?php

                        foreach ($listaProductos as $item) {
                        
                            $idInstrumento = $item['id_instrumento'];
                            $nombre = $item['nombre_instrumento'];
                            $foto = $item['foto'];
                            $precio = $item['precio'];

                            echo "
                                <div class='items'>
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href='producto/detalle?id=$idInstrumento'>$nombre
                                                <p class=''>Precio: $$precio</p><br>
                                                <img src='public/fotitos/$foto' alt='$nombre'></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        <div>
    </main>