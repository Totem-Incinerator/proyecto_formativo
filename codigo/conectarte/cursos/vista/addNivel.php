<?php
    require_once('../modelo/cursos.php');
    $id = $_GET['arreglo'];

    $arreglo = explode('-', $id);
    $objCurso = new curso();
    $niveles = $objCurso->verNivel();

    echo '<pre>';
    print_r($arreglo);
    echo '<pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nivel</title>
</head>
<body>

    <form action="../controlador/addnivel.php" method="POST">
        <label for="">Id curso</label>
        <input type="text" disabled value="<?= $arreglo[0]  ?>">
        <label for="" disabled>Nombre curso</label>
        <input type="text" disabled value="<?= $arreglo[1] ?>">
        <label for="">Id Categoria</label>
        <input type="text" disabled value="<?= $arreglo[2] ?>">
        <label for="">Descripcion</label>
        <label for="">Nivel</label>
            
        <select name="nivel">
            <?php 
            if ($niveles != null) {
                foreach($niveles as $nivel){
            ?>
                <option value="<?= $nivel['nivel']; ?>"><?= $nivel['nivel']; ?></option>
            <?php 
                }
            }
            ?>
        </select>
            

        <input type="textarea">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>