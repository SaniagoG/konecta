<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>

</head>

<body>

    <?php require "views/header.php" ?>
    <table class="table center">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>REFERENCIA</th>
                <th>PRECIO</th>
                <th>PESO</th>
                <th>CATEGORIA</th>
                <th>STOCK</th>
                <th>FECHA</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include_once "models/producto.php";
            foreach ($this->producto as $row) {
                $producto = new Producto();
                $producto = $row;
            ?>


            <tr>
                <td scope="row"> <?php echo $producto->id; ?></td>
                <td><?php echo $producto->nombre; ?></td>
                <td><?php echo $producto->referencia; ?></td>
                <td><?php echo $producto->precio; ?></td>
                <td><?php echo $producto->peso; ?></td>
                <td><?php echo $producto->categoria; ?></td>
                <td><?php echo $producto->stock; ?></td>
                <td><?php echo $producto->fecha_creacion; ?></td>
                <td> <a href="<?php echo constant('URL') . "consulta/verProducto/" . $producto->id ?>">Actualizar</a>
                </td>
                <td> <a href="<?php echo constant('URL') . "consulta/eliminarProducto/" . $producto->id ?>">Eliminar</a>
                </td>
            </tr>
            <?php  }; ?>

        </tbody>
    </table>
    <?php require "views/footer.php" ?>
</body>

</html>