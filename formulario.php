<?php
session_start();
$resultado = '';

if (isset($_SESSION['resultado'])) {
    $resultado = $_SESSION['resultado'];
    unset($_SESSION['resultado']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
</head>
<body>

    <h1>FORMULARIO DE DATOS</h1>

   
    <?php echo $resultado; ?>

    <form action="procesamiento.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input id="nombre" name="nombre" type="text"><br><br>

        <label for="modelo">Modelo:</label>
        <input id="modelo" name="modelo" type="text"><br><br>

        <label for="cantidad">Cantidad:</label>
        <input id="cantidad" name="cantidad" type="text"><br><br>

        <label for="valor">Valor:</label>
        <input id="valor" name="valor" type="text"><br><br>

        <input type="submit" name="agregar" value="Agregar">
        <input type="submit" name="buscar" value="Buscar">
        <input type="submit" name="mostrar" value="Mostrar">
        <input type="submit" name="actualizar" value="Actualizar">
        <input type="submit" name="limpiar" value="Limpiar"><br><br>

      
        <input type="hidden" name="calcular_valor_total">
        <input type="hidden" name="filtrar_por_valor">
        <input type="hidden" name="listar_modelos_disponibles">
        <input type="hidden" name="valor_promedio">
    </form>

</body>
</html>
