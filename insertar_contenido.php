<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$miconexion=mysqli_connect("localhost","root","","bbddblog");

//comprobamos conexion

if(!$miconexion){
    echo "La conexión ha fallado";
    exit();
}
//si hay algún error en la carga le pedimos que nos informe...
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
            # code...
            break;
    }
    //y si no hay errores...
}else{
    echo "La imagen se subió de manera correcta<br>";

    //si se ha subido la imagen y devuelve 0 quiere decir que todo esta OK
    if(isset($_FILES['imagen']['error']) && ($_FILES['imagen']['error']==0)){
        $destinoderuta="img/";

        //movemos la imagen de la carpeta temporal a una carpeta en concreto dentro del proyecto
        move_uploaded_file($_FILES['imagen']['tmp_name'],$destinoderuta . $_FILES['imagen']['name']);
        echo "El archivo <i>". $_FILES['imagen']['name'] ."</i> se ha copiado en el directorio de img";
    }else{
        echo "El archivo no se ha podido copiar a /img";
    }
}
$titulo=$_POST['titulo'];
$comentario=$_POST['comentario'];
$fecha=date('Y-m-d H:i:s');
$imagen=$_FILES['imagen']['name'];


$miconsulta="INSERT INTO CONTENIDO (TITULO,FECHA,COMENTARIO,IMAGEN) VALUES ('$titulo','$fecha','$comentario','$imagen')";

$resultado=mysqli_query($miconexion,$miconsulta);

mysqli_close($miconexion);

echo "<br> Se agregó al entrada con éxito</br></br></br>";
?> 
</body>
</html>
