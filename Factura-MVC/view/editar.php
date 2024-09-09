<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Editar Artículo</h2>
    <form method="post" action="index.php?action=editar&id=<?= $articulo->id ?>">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $articulo->nombre ?>" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?= $articulo->cantidad ?>" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" class="form-control" step="0.01" value="<?= $articulo->valor ?>" required>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" id="comentario" class="form-control"><?= $articulo->comentario ?></textarea>
        </div>
        <button type="submit" name="btnGuardar" class="btn btn-success">Guardar Cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
