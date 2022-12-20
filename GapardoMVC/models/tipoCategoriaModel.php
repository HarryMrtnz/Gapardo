<?php
    require_once 'core/ConexionPDO.php';

    class TipoCategoriaModel extends ConexionDB {
        public $idTipo;
        public $nombre;
    }

    public function lista(){
        $this->setQuery("SELECT id_tipo, nombreTipos
                        FROM tipos");

        $resultado = $this->obtenerRow();
        return $resultado;
    }

    public function guardar(){
        $this->setQuery("INSERT INTO tipos(nombreTipos)
                        VALUES(:tipos, :nombreTipos)");
        $this->ejecutar(array(
            ':nombre' => $this->nombre,
        ));
    }

    public function eliminar(){
        $this->setQuery("DELETE FROM tipos
                         WHERE id_tipo = :id_tipo");
        
        $this->ejecutar(array(
            ':id_tipo' => $this->idTipo,
        ));
    }

    public function actualizar(){
        $this->setQuery("UPDATE tipos
                        SET nombreTipos = 'otra cosa'
                        WHERE id_tipo = :idTipo");
        $this->ejecutar(array(
                        ':idTipo' => $this->idTipo,
        ));               
    }

    
?>