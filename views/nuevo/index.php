<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <?php require "views/header.php" ?>
    <div class="main">
        <h1 class="center ">Seccion de nuevo</h1>
        <div class="center"><?php echo $this->mensaje; ?></div>
    </div>
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registrar productos</h4>
                <form action="<?php echo constant('URL') ?>nuevo/registrarproducto" method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="n_nombre" id="id_nombre"
                                placeholder="Nombre del producto" value="<?php echo @$nombre ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Referencia</label>
                            <input type="text" class="form-control" name="n_referencia" id="id_referencia"
                                placeholder="Referencia" value="<?php echo @$referencia ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="n_precio" id="id_precio"
                                placeholder="Valor producto" value="<?php echo @$precio ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Peso</label>
                            <input type="text" class="form-control" name="n_peso" id="id_peso" placeholder="Kg"
                                value="<?php echo @$peso ?>" required>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="n_categoria" class="form-label">Categoria</label>
                                <select class="form-select" name="n_categoria" id="id_categoria" required>
                                    <option value="cafe">Café</option>
                                    <option value="comida">Comida</option>
                                    <option value="bebida">Bebida</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="n_stock" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="n_stock" id="id_stock"
                                placeholder="Cantidad" value="<?php echo @$stock ?>" required>
                        </div>

                        <div class="mb3">
                            <input type="submit" class="btn btn-success" name="accion" value="Registrar">
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <?php require "views/footer.php" ?>
</body>

</html>