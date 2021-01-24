<?php
class Objeto_blog{

        //declaramos las propiedades de este objeto
    private $id;
    private $titulo;
    private $fecha;
    private $comentario;
    private $imagen;

    //determinamos los métodos: getters y setters

    public function getId(){
        return $this->id;
    }

    public function setId($local_id){
        $this->id=$local_id;
    }
    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($local_titulo){
        $this->titulo=$local_titulo;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($local_fecha){
        $this->fecha=$local_fecha;
    }
    public function getComentario(){
        return $this->comentario;
    }

    public function setComentario($local_comentario){
        $this->comentario=$local_comentario;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function setImagen($local_imagen){
        $this->imagen=$local_imagen;
    }
}
?>