<?php

session_start();

require '../vendor/autoload.php';

$id = obtener_get('id');

if ($id === null) {
    return volver();
}

$carrito = unserialize(carrito());
$carrito->eliminar($id);
$_SESSION['carrito'] = serialize($carrito);

header('Location: comprar.php');