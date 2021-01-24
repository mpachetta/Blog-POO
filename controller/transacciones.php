<?php

include_once ("../model/manejo_objetos.php");
include_once ("../model/objeto_blog.php");

try {
    $miconexion=new PDO('mysql:host=localhost;dbname=bbddblog','root','');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//comprobamos si la imagen se carga e informa el error que se ha presentado

if($_FILES['imagen']['error']){
    switch ($_FILES['imagen']['error']) {
        case '1':
            echo "El tamaño del archivo es muy grande";
        
            break;
        case '2':
            echo "Error tamaño archivo marcado desde el formulario";
            break;
        case '3':
            echo "Error en la trasmisión. No se pudo cargar";
            break;
        case '4':
            echo "El usuario no escogió ningún archivo";
            break;
        default:
            # code...podriamos poner algo
            break;
    }
    
    
}else{
    echo "La imagen se subió de manera correcta<br>";

   
    if(isset($_FILES['imagen']['error']) && ($_FILES['imagen']['error']==0)){
        $destinoderuta="../img/";

     
        move_uploaded_file($_FILES['imagen']['tmp_name'],$destinoderuta . $_FILES['imagen']['name']);
        echo "El archivo <i>". $_FILES['imagen']['name'] ."</i> se ha copiado en el directorio de img";
    }else{
        echo "El archivo no se ha podido copiar a img";
    }
}

$newManejo_objetos= new Manejo_objetos($miconexion);

$blog=new Objeto_blog();

$blog->setTitulo(htmlentities(addslashes($_POST['titulo']),ENT_QUOTES));
$blog->setFecha(Date("Y-m-d H:i:s"));
$blog->setComentario(htmlentities(addslashes($_POST['comentario']),ENT_QUOTES));
$blog->setImagen($_FILES['imagen']['name']);

$newManejo_objetos->insertContenido($blog);

echo "<br>Entrada de bloga agregada con éxito<br>";

} catch (Exception $e) {
    die("Error".$e->getMessage());
}


?>