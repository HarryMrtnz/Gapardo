    <main id="productos">
        <div class="salir">
            <a href="">CERRAR SESION
                <img src="public/img/salir.png" alt="salir"></a>
        </div>
<!-- Fila 1 -->
        <div>    
            <div class="productos">
                <h1>PRODUCTOS</h1>

                <div>
                    <a href="productos.html">
                    <img src="public/img/cuerdas.jpg" alt="cuerdas" class="img-fluid"></a>
                </div>
                <div>
                    <a href="productos.html">
                    <img src="public/img/vientos.jpg" alt="vientos" class="img-fluid"></a>
                </div>
                <div>
                    <a href="productos.html">
                    <img src="public/img/percusion.jpg" alt="percusion" class="img-fluid"></a>
                </div>
                <div>
                    <a href="productos.html">
                    <img src="public/img/otros.jpg" alt="otros" class="img-fluid"></a>                
                </div>
                    <!-- Fila 2 -->
                <div id="cates" class="categorias">

                    <ul><h3>CATEGORIAS</h3>
            
                        <?php

                            for ($i=0; $i < count($lista); $i++) { 
                                $id_categoria = $lista[$i]['id_categoria'];
                                $categoria = $lista[$i]['categoria'];

                                echo "<li>
                                        <a href='producto/listar/$id_categoria'>$categoria</a>
                                    </li>";
                            }

                        ?>

                    </ul>
                </div>
<!-- Fila 3 -->
                <div class="prods">

                    <?php

                        foreach ($listaProductos as $item) {
                        
                            $id_instrumento = $item['id_instrumento'];
                            $nombreInstrumento = $item['nombreInstrumento'];
                            $fotoInstrumento = $item['fotoInstrumento'];
                            $precioInstrumento = $item['precioInstrumento'];

                            echo "
                                <div class='items'>
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href=''>$nombreInstrumento
                                                <p class=''>Precio: $$precioInstrumento</p><br>
                                                <img src='public/fotitos/$fotoInstrumento' alt='$nombreInstrumento'></a>
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