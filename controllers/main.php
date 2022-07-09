<?php
include_once "models/producto.php";
class Main extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $producto  = $this->model->getMain();
        $this->view->producto = $producto;
        $this->view->render('main/index');
    }
}