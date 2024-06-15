<?php
session_start();

// Definir las funciones
function agregarProducto($nombre, $modelo, $valor, $cantidad) {
    $producto = [
        'nombre' => $nombre,
        'modelo' => $modelo,
        'valor' => $valor,
        'cantidad' => $cantidad,
    ];

    $productos = isset($_SESSION['productos']) ? $_SESSION['productos'] : [];

    $productos[] = $producto;

    $_SESSION['productos'] = $productos;

    return "Producto agregado correctamente.<br>";
}

function buscarProductoPorModelo($productos, $modelo) {
    foreach ($productos as $producto) {
        if ($producto['modelo'] == $modelo) {
            return "Nombre: " . $producto['nombre'] . ", Valor: " . $producto['valor'] . ", Cantidad: " . $producto['cantidad'] . "<br>";
        }
    }
    return "Producto no encontrado.<br>";
}

function mostrarProductos($productos) {
    $result = '';
    foreach ($productos as $producto) {
        $result .= "Nombre: " . $producto['nombre'] . ", Valor: " . $producto['valor'] . ", Cantidad: " . $producto['cantidad'] . ", Modelo: " . $producto['modelo'] . "<br>";
    }
    return $result; 
}

function actualizarProducto($productos, $modelo, $nombre, $valor, $cantidad) {
    foreach ($productos as &$producto) {
        if ($producto['modelo'] == $modelo) {
            $producto['nombre'] = $nombre;
            $producto['valor'] = $valor;
            $producto['cantidad'] = $cantidad;
            break;
        }
    }
    return "Producto actualizado correctamente.<br>";
}

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$productos = $_SESSION['productos'];
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $valor = $_POST['valor'] ?? '';
        $cantidad = $_POST['cantidad'] ?? '';
        
        $resultado = agregarProducto($nombre, $modelo, $valor, $cantidad);
    } elseif (isset($_POST['buscar'])) {
        $modelo = $_POST['modelo'] ?? '';
        $resultado = buscarProductoPorModelo($productos, $modelo);
    } elseif (isset($_POST['mostrar'])) {
        $resultado = mostrarProductos($productos);
    } elseif (isset($_POST['actualizar'])) {
        $nombre = $_POST['nombre'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $valor = $_POST['valor'] ?? '';
        $cantidad = $_POST['cantidad'] ?? '';

        $resultado = actualizarProducto($productos, $modelo, $nombre, $valor, $cantidad);
    } elseif (isset($_POST['limpiar'])) {
        $_SESSION['productos'] = [];
        $resultado = "Productos eliminados correctamente.<br>";
    } else {
        $resultado = "Acción no válida.";
    }

    $_SESSION['resultado'] = $resultado;

    header("Location: formulario.php");
    exit();
}
?>
