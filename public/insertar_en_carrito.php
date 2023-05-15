<?php

use App\Tablas\Articulo;

session_start();

require '../vendor/autoload.php';

$categoria = obtener_get('categoria'); // Capturar la categoría.

try {
    $id = obtener_get('id');

    if ($id === null) {
        return volver();
    }

    $articulo = Articulo::obtener($id);

    if ($articulo === null) {
        return volver();
    }

    if ($articulo->getStock() <= 0) {
        $_SESSION['error'] = 'No hay existencias suficientes.';
        return volver();
    }

    $carrito = unserialize(carrito());
    $carrito->insertar($id);
    $_SESSION['carrito'] = serialize($carrito);

    // Mantener la categoría en el buscador.
    if ($categoria !== null) {
        header('Location: index.php?categoria=' . $categoria);
    } else {
        volver();
    }
} catch (ValueError $e) {
    // TODO: mostrar mensaje de error en un Alert
}

