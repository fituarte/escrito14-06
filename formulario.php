

<?php
session_start();
$resultado = '';

// Verificar si hay un resultado almacenado en la sesión
if (isset($_SESSION['resultado'])) {
    $resultado = $_SESSION['resultado'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <form action="procesamiento.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        
        <label for="cantidad">cantidad:</label>
        <input type="number" id="cantidad" name="cantidad"><br>
        
        <label for="valor">Email:</label>
        <input type="text" id="valor" name="valor">
        
        <input type="text" id="modelo" name="modelo" value="agregar">
        <input for="modelo">Agregar</input><br>
        
    
    </form>

    <form action="procesamiento.php" method="POST">
        <input type="hidden" name="accion" value="limpiar">
        <input type="submit" value="Limpiar Resultados">
    </form>

    <!-- <div id="resultados">
    
       
    </div> -->

    <div id="resultados">
    <?php echo $resultado; 
   
    ?>
    
    </div>

    
</body>
</html>



