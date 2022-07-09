<?php
include_once "models/producto.php";
class Consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
        $mensaje = "";
    }
    function render()
    {
        $producto  = $this->model->get();
        $this->view->producto = $producto;
        $this->view->render('consulta/index');
    }
    function verProducto($param = null)
    {
        $mensaje = "";
        $id_Producto = $param[0];

        $producto = $this->model->getByid($id_Producto);
        session_start();
        $_SESSION['id_producto'] = $producto->id;
        $this->view->producto = $producto;
        $this->view->mensaje = $mensaje;

        $this->view->render('consulta/detalle');
    }
    function actualizarProducto()
    {
        session_start();
        $id = $_SESSION['id_producto'];
        $nombre = $_POST['n_nombre'];
        $referencia = $_POST['n_referencia'];
        $precio = $_POST['n_precio'];
        $peso = $_POST['n_peso'];
        $categoria = $_POST['n_categoria'];
        $cantidad = $_POST['n_stock'];
        $fecha = date('Y-m-d');
        unset($_SESSION['id_producto']);
        if ($this->model->update(['id' => $id, 'nombre' => $nombre, 'referencia' => $referencia, 'precio' => $precio, 'peso' => $peso, 'categoria' => $categoria, 'stock' => $cantidad, 'fecha_creacion' => $fecha])) {
            $producto = new Producto();
            $producto->id = $id;
            $producto->nombre = $nombre;
            $producto->referencia = $referencia;
            $producto->precio = $precio;
            $producto->peso = $peso;
            $producto->categoria = $categoria;
            $producto->stock = $cantidad;
            $producto->fecha_creacion = $fecha;

            $this->view->producto = $producto;
            $this->view->mensaje = "Se actualizo el producto";
        } else {
            $this->view->mensaje = "No se actualizo";
        }
        $this->view->render('consulta/detalle');
    }
    function eliminarProducto($param = null)
    {
        $matricula = $param[0];

        if ($this->model->delete($matricula)) {
            //$this->view->mensaje = "Alumno eliminado correctamente";
            $mensaje = "Producto eliminado correctamente";
        } else {
            $mensaje = "No se pudo eliminar el producto";
        }
        echo $mensaje;
    }
}