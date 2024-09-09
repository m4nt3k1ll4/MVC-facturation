<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <a href="index.php?action=agregar" class="btn btn-primary mb-3">Agregar Artículo</a>

    <!-- Tabla de Artículos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $subtotal = 0;
            foreach ($articulos as $articulo): 
                $subtotal += $articulo->cantidad * $articulo->valor;
            ?>
            <tr>
                <td><?= $articulo->id ?></td>
                <td><?= $articulo->nombre ?></td>
                <td><?= $articulo->cantidad ?></td>
                <td><?= number_format($articulo->valor, 2) ?></td>
                <td><?= $articulo->comentario ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?= $articulo->id ?>" class="btn btn-warning">Editar</a>
                    <a href="index.php?action=eliminar&id=<?= $articulo->id ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Cálculos -->
    <div class="row">
        <div class="col-md-4">
            <h5>Subtotal: $<?= number_format($subtotal, 2) ?></h5>
        </div>
        <div class="col-md-4">
            <h5>IVA (19%): $<?= number_format($subtotal * 0.19, 2) ?></h5>
        </div>
        <div class="col-md-4">
            <label for="descuento">Descuento:</label>
            <select id="descuento" class="form-control" onchange="calcularTotal()">
                <option value="0">Sin descuento</option>
                <option value="0.05">5%</option>
                <option value="0.10">10%</option>
                <option value="0.15">15%</option>
                <option value="0.20">20%</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 offset-md-8">
            <h5>Total: $<span id="valorTotal"><?= number_format($subtotal * 1.19, 2) ?></span></h5>
        </div>
    </div>

    <!-- Script para calcular el total con descuento -->
    <script>
        function calcularTotal() {
            let subtotal = <?= $subtotal ?>;
            let iva = subtotal * 0.19;
            let descuento = document.getElementById('descuento').value;
            let total = (subtotal + iva) * (1 - descuento);
            document.getElementById('valorTotal').innerText = total.toFixed(2);
        }
    </script>

</body>
</html>
