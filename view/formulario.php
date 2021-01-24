<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <style>
        form div, #caja5{
            width:300px;
            margin:auto;
            padding: 20px;
            display: flex;
            
        }

        form div{
            background-color: rebeccapurple;
        }
        form div textarea{
            width:250px;
        }
        form div input{
            width:250px;
        }
        form label, #caja3{
            color:white;
        }
        h2{
            text-align: center;
            color:blueviolet;
        }
        #caja5 a{
            margin: auto;
        }
    </style>
</head>
<body>
    <h2>Nueva entrada</h2>
    <form action="../controller/transacciones.php" method="post" enctype="multipart/form-data" name="form1">
<div id="caja1">
<label for="titulo">Título: </label>
<input type="text" name="titulo">

</div>
<div id="caja2">
<label for="comentario">Comentario: </label>
<textarea  name="comentario" id="" rows=10 cols=0></textarea>
</div>
<div id="caja3">
    Seleccione una imagen con tamaño inferior a 2MB
    <input type="hidden" name="tam_max" value="2097152">
</div>
<div id="caja4">
    <input type="file" name="imagen" id="">
</div>
<div id="caja4">
<input type="submit" name="btn_enviar" value="Enviar">
</div>
</form>
<div id="caja5">
    <a href="mostrar_blog.php">Vista previa</a>
</div>
</body>
</html>