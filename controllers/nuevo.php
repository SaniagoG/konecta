<?php

class Nuevo extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }
    function render()
    {
        $this->view->render('nuevo/index');
    }
    function registrarproducto()
    {
        $nombre = $_POST['n_nombre'];
        $referencia = $_POST['n_referencia'];
        $precio = $_POST['n_precio'];
        $peso = $_POST['n_peso'];
        $categoria = $_POST['n_categoria'];
        $cantidad = $_POST['n_stock'];
        $fecha = date('Y-m-d');

        $mensaje = "";

        if ($this->model->insert(['nombre' => $nombre, 'referencia' => $referencia, 'precio' => $precio, 'peso' => $peso, 'categoria' => $categoria, 'cantidad' => $cantidad, 'fecha' => $fecha])) {
            $mensaje = "Producto registrado";
        } else {
            $mensaje = "Hubo un error al registrar";
        };
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}