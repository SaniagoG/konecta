<?php

include_once 'models/producto.php';

class MainModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getMain()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM producto");
            while ($row = $query->fetch()) {
                $item = new Producto();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->referencia = $row['referencia'];
                $item->precio = $row['precio'];
                $item->peso = $row['peso'];
                $item->categoria = $row['categoria'];
                $item->stock = $row['stock'];
                $item->fecha_creacion = $row['fecha_creacion'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}