<?php

function agregarProducto($listaProductos, $nuevoProducto){
    $listaProductos[] = $nuevoProducto;
return $listaProductos;
};
$productos = [

["nombre" => "championes", "cantidad" => 20, "valor" => "1500", "modelo" => "nike"],

];

$nuevoProducto = ["nombre" => "pantalon", "cantidad" => 40, "valor" => "500", "modelo" => "las locas"];

$productos = agregarProducto($productos, $nuevoProducto);
echo "ejercicio 1";
var_dump($productos);




function buscarProducto($listaProductos, $modelo){

foreach($listaProductos as $producto){
    if($producto["modelo"] === $modelo){

        return $producto["nombre"]. " ". $producto["modelo"];

    }
}

return "El producto no fue encontado";

}

echo "ejercicio 2 " . buscarProducto($productos, "nike") . "<br>";


function mostrarProductos($listaProductos){

    foreach($listaProductos as $producto){
echo  "nombre: " .$producto["nombre"] ." modelo " .$producto["modelo"]. "<br>"; 

    };
}
    echo mostrarProductos($productos);

function actualizarProducto($productos, $nombre, $nuevosDatos){

    foreach ($productos as &$producto) {
        if ($producto['nombre'] === $nombre) {
            $producto = array_replace($producto, $nuevosDatos);
            return $productos;
        }
    }
    return "El nombre del producto no fue encontrado.";
}

$nuevosDatos = ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "victor"];
$productos = actualizarProducto($productos, "championes", $nuevosDatos);

var_dump($productos);


$productosValor = [
    ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "victor"],
    ["nombre" => "pantalon", "cantidad" => 40, "valor" => "600", "modelo" => "victor"],
    ["nombre" => "celular", "cantidad" => 40, "valor" => "700", "modelo" => "victor"],
    ["nombre" => "tv", "cantidad" => 40, "valor" => "800", "modelo" => "victor"]
];


function calcularValorInventario($productosValor){
    $suma = 0;

  foreach($productosValor as $producto){
    $costo = $producto["valor"];
   $valor = floatval($costo);
   $suma += $valor; 
}

return $suma;
}

$inventario = calcularValorInventario($productosValor);

echo $inventario;




$filtrarProductos = [
    ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "victor"],
    ["nombre" => "pantalon", "cantidad" => 40, "valor" => "600", "modelo" => "victor"],
    ["nombre" => "celular", "cantidad" => 40, "valor" => "700", "modelo" => "victor"],
    ["nombre" => "tv", "cantidad" => 40, "valor" => "800", "modelo" => "victor"]
];

function filtrarProductosPorValor($productos, $valorMinimo) {
    $productosFiltrados = array();

    foreach ($productos as $producto) {
        $costo = $producto["valor"];
   $valor = floatval($costo);
        if ($valor > $valorMinimo) {
            $productosFiltrados[] = $producto;
        }
    }

    return $productosFiltrados;
}

$resultadoFiltrado = filtrarProductosPorValor($productos, 80);

echo "<h2>Productos con valor mayor a 80:</h2>";
echo "<ul>";
foreach ($resultadoFiltrado as $producto) {
    echo "<li>{$producto['nombre']} - Valor: {$producto['valor']}</li>";
}
echo "</ul>";


$productos = [
    ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "adidas"],
    ["nombre" => "pantalon", "cantidad" => 40, "valor" => "600", "modelo" => "reebok"],
    ["nombre" => "celular", "cantidad" => 40, "valor" => "700", "modelo" => "samsung"],
    ["nombre" => "tv", "cantidad" => 40, "valor" => "800", "modelo" => "panavox"]
];

$modelos_disponibles = array();

foreach ($productos as $producto) {
    $modelo = $producto['modelo'];
    if (!in_array($modelo, $modelos_disponibles)) {
        $modelos_disponibles[] = $modelo;
    }
}

echo "<h2>Modelos Disponibles:</h2>";
echo "<ul>";
foreach ($modelos_disponibles as $modelo) {
    echo "<li>$modelo</li>";
}
echo "</ul>";

$productosPromedio = [
    ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "adidas"],
    ["nombre" => "pantalon", "cantidad" => 40, "valor" => "600", "modelo" => "reebok"],
    ["nombre" => "celular", "cantidad" => 40, "valor" => "700", "modelo" => "samsung"],
    ["nombre" => "tv", "cantidad" => 40, "valor" => "800", "modelo" => "panavox"]
];

function calcularPromedio($productosPromedio){
    $suma = 0;
    $promedio = 0;

  foreach($productosPromedio as $producto){
    $costo = $producto["valor"];
   $valor = floatval($costo);
   $suma += $valor;
   $promedio = $suma / count($productosPromedio);
}

return $promedio;
}

$promedio = calcularPromedio($productosPromedio);

echo  "el promedio es: " . $promedio;


function limpiarResultados(&$productos) {
    foreach ($productos as $key => $value) {
        unset($productos[$key]);
    }
}

$productos = [
    ["nombre" => "championes", "cantidad" => 40, "valor" => "500", "modelo" => "adidas"],
    ["nombre" => "pantalon", "cantidad" => 40, "valor" => "600", "modelo" => "reebok"],
    ["nombre" => "celular", "cantidad" => 40, "valor" => "700", "modelo" => "samsung"],
    ["nombre" => "tv", "cantidad" => 40, "valor" => "800", "modelo" => "panavox"]
];

echo "<h2>Productos antes de vaciar:</h2>";
echo "<pre>";
print_r($productos);
echo "</pre>";

limpiarResultados($productos);

echo "<h2>Productos después de vaciar:</h2>";
echo "<pre>";
print_r($productos);
echo "</pre>";

?>


