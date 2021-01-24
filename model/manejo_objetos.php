<?php

include_once ('objeto_blog.php');

class Manejo_objetos{

    private $conexion;

    public function __construct($local_conexion){
        
        $this->setConexion($local_conexion);
    }

    public function setConexion(PDO $local_conexion){
        $this->conexion=$local_conexion;
    }

    //este método obtiene el contenido de la BBDD

    public function getContenidoPorFecha(){

        $matriz=array();

        $contador=0;

        $resultado=$this->conexion->query("SELECT * FROM CONTENIDO ORDER BY FECHA DESC");

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

            $blog=new Objeto_blog();

            $blog->setId($registro['id']);
            $blog->setTitulo($registro['titulo']);
            $blog->setFecha($registro['fecha']);
            $blog->setComentario($registro['comentario']);
            $blog->setImagen($registro['imagen']);

        //cada objeto ya construido lo almacenamos dentro de una array
            $matriz[$contador]=$blog;
            $contador++;
    }

    return $matriz;
}

//este método inserta el contenido del formulario a la BBDD
    public function insertContenido(Objeto_blog $blog){

        $sql="INSERT INTO CONTENIDO (TITULO,FECHA,COMENTARIO,IMAGEN) VALUE ('".$blog->getTitulo()."','".$blog->getFecha()."','".$blog->getComentario()."','".$blog->getImagen()."')";

        $this->conexion->exec($sql);
    }
}
?>