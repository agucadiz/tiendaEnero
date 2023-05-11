<?php

/* Indica que la clase "Categoria" pertenece al namespace "App\Tablas". 
Esto ayuda a organizar y agrupar las clases relacionadas en un espacio de nombres específico. */
namespace App\Tablas; 

use App\Tablas\Modelo;

/* Importa la clase "Modelo" del namespace "App\Generico" para poder utilizarla en la clase "Categoria". 
El uso de use permite acceder a clases de otros namespaces sin tener que escribir el nombre completo cada vez que se las referencia. */
class Categoria extends Modelo
{
    /* Dentro de la clase "Categoria", se define una propiedad estática protegida llamada $tabla, 
    que almacena el nombre de la tabla de base de datos correspondiente a la clase. */ 
    protected static string $tabla = 'categorias';

    public $id;
    public $categoria;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->categoria = $campos['categoria'];
    }
}