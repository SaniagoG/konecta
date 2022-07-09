<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/default.css">
</head>

<body>
    <?php require "views/header.php" ?>

    <div class="parent">
        <?php
        include_once "models/producto.php";
        foreach ($this->producto as $row) {
            $producto = new Producto();
            $producto = $row;
        ?>

        <div class="card">

            <div class="containerc">

                <h4><b>Producto <?php echo $producto->nombre; ?></b></h4>
                <p>REF: <?php echo $producto->referencia; ?></p>
                <p>PRECIO: <?php echo $producto->precio; ?></p>
                <p>GRAMAJE: <?php echo $producto->peso; ?>/g</p>

                <p>CATEGORIA: <?php echo $producto->categoria; ?></p>
                <h3>Cantidad disponible: <?php echo $producto->stock; ?></h3>
                <h5>Ingreso del producto:<?php echo $producto->fecha_creacion; ?></h5>
                <div class="botones">
                    <a class="btn btn1"
                        href="<?php echo constant('URL') . "carrito/agregarProducto/" . $producto->id ?>">Agregar al
                        carrito</a>
                </div>
            </div>
        </div>

        <?php  }; ?>
    </div>
    <?php require "views/footer.php" ?>

</body>

</html>