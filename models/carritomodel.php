<?php


class CarritoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function registrarproducto($item)
    {
        $query = $this->db->connect()->prepare("INSERT INTO carrito(id_usuario,id_producto) VALUES (id_usuario = :id_usuario, id_producto = :id_producto)");
        try {
            $query->execute([
                'id_usuario' => $item['id'],
                'id_producto' => $item['id_pro'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
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