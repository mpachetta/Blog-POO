<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .caja{
        width:400px;
        margin: auto;
        background-color: #f4f3db;
        padding:24px;
        
       
    }
hr{
    width:400px;
  
    margin:10px auto;
}
    h1{
        text-align: center;
        color:#fff;
        font-size: 6em;
        background-color: #bbb36a;
    }

    .c_img{
        width: 400px;
    }

    .c_comentario{
        width:380px;
        
    }

    .c_titulo{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 2em;
        color:#342d18;
    }
    #lateral{
        background-color: lightslategray;
        width:200px;
   position: fixed;
top:180px;
   
   right:10px;
   height:100vh;
   
    }
    #contenedor{
        display: flexbox;
        flex-direction: row;
    }

    #contenido li{
        font-size: 16px;
        color: #fff;
        font-weight: lighter;
        margin:10px;
        
    }
    </style>
</head>
<body>
<h1>Mi Blog</h1>
<div id="contenedor">
<?php

include_once ("../model/manejo_objetos.php");

try {
    $miconexion=new PDO('mysql:host=localhost;dbname=bbddblog','root','');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$newManejoObj= new Manejo_objetos($miconexion);

$tabla_blog=$newManejoObj->getContenidoPorFecha();

if(empty ($tabla_blog)){
    echo ("No hay entradas publicadas");
}else{

    foreach($tabla_blog as $valor){
        
        echo "<div class='caja'>";
        echo "<h2 class='c_titulo' id='".$valor->getTitulo()."'>".$valor->getTitulo()."</h2>";
        echo "<h6 class='c_fecha'>".$valor->getFecha()."</h6>";
        echo "<p class='c_comentario'>".$valor->getComentario()."</p>";
        
        if($valor->getImagen()!=""){
        echo "<img src='../img/".$valor->getImagen()."' class='c_img'>";
        }
    echo "</div>";
    echo "<hr>";
    }

}


} catch (Exception $e) {
    die("Error".$e->getMessage());
}



?>
<div id="lateral">
<div id="contenido">
<h2>Nuestro contenido</h2>
<?php
    foreach($tabla_blog as $valor){
        
        echo "<li class='c_titulo'><a href='#".$valor->getTitulo()."'>".$valor->getTitulo()."</a></li>";

        
    
    }
    
    
?>
</div>
</div>
</div>
<a href="formulario.php">Volver a formulario</a>
</body>
</html>