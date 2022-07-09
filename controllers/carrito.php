<?php
include_once "models/producto.php";
class Carrito extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
        $mensaje = "";
    }
    public function render()
    {
        $this->view->render('main/index');
    }
    function agregarProducto($idproducto)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $id = $idproducto[0];
        $idSession = session_id();
        $this->model->registrarproducto(['id' => $idSession, 'id_pro' => $id]);
        $producto  = $this->model->getMain();
        $this->view->producto = $producto;
        $this->view->render('main/index');
    }
    function obtenerProductosEnCarrito()
    {
    }
}