<?php

session_start();

use App\Tablas\Articulo;
use ValueError;

require '../vendor/autoload.php';

$id = obtener_get('id');

if ($id === null) {
    return volver();
}

$carrito = unserialize(carrito());
$carrito->insertar($id);
$_SESSION['carrito'] = serialize($carrito);

header('Location: comprar.php');