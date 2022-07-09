<?php

include_once 'models/producto.php';

class ConsultaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
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
    public function getById($id)
    {
        $item = new Producto();

        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id = :id");

        try {
            $query->execute(['id' => $id]);
            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->referencia = $row['referencia'];
                $item->precio = $row['precio'];
                $item->peso = $row['peso'];
                $item->categoria = $row['categoria'];
                $item->stock = $row['stock'];
                $item->fecha_creacion = $row['fecha_creacion'];
            }
            return $item;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE producto SET nombre = :nombre, referencia = :referencia, precio = :precio, peso=:peso, categoria=:categoria, stock=:stock, fecha_creacion=:fecha_creacion WHERE id = :id");
        try {
            $query->execute([
                'id' => $item['id'],
                'nombre' => $item['nombre'],
                'referencia' => $item['referencia'],
                'precio' => $item['precio'],
                'peso' => $item['peso'],
                'categoria' => $item['categoria'],
                'stock' => $item['stock'],
                'fecha_creacion' => $item['fecha_creacion']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function delete($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM producto WHERE id = :id");
        try {
            $query->execute([
                'id' => $id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}