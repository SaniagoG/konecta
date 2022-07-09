<?php
class NuevoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data)
    {
        try {
            $query = $this->db->connect()->prepare("INSERT INTO `producto`( `nombre`, `referencia`, `precio`, `peso`, `categoria`, stock, `fecha_creacion`) VALUES (:nombre,:referencia,:precio,:peso,:categoria,:stock,:fecha_creacion)");
            $query->execute(['nombre' => $data['nombre'], 'referencia' => $data['referencia'], 'precio' => $data['precio'], 'peso' => $data['peso'], 'categoria' => $data['categoria'], 'stock' => $data['cantidad'], 'fecha_creacion' => $data['fecha']]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}