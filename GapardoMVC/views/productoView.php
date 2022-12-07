    <main id="productos">
        <div>    
            <div class="productos">
                <h1>PRODUCTOS</h1>

                <div>
                    <a href="producto">
                    <img src="public/img/cuerdas.jpg" alt="cuerdas" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto">
                    <img src="public/img/vientos.jpg" alt="vientos" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto">
                    <img src="public/img/percusion.jpg" alt="percusion" class="img-fluid"></a>
                </div>
                <div>
                    <a href="producto">
                    <img src="public/img/otros.jpg" alt="otros" class="img-fluid"></a>                
                </div>
                    <!-- Fila 2 -->
                <div id="cates" class="categorias">

                    <ul><h3>CATEGORIAS</h3>
            
                        <?php

                            for ($i=0; $i < count($lista); $i++) { 
                                $idCategoria = $lista[$i]['id_categoria'];
                                $nombreCategoria = $lista[$i]['nombre_categoria'];

                                echo "<li>
                                        <a href='producto/listar?categoria=$idCategoria'>$nombreCategoria</a>
                                    </li>";
                            }

                        ?>

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