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


?>