<?php
require 'config.php';
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['nombre'];
  $price = $_POST['precio'];
  $stock = $_POST['stock'] ?? 0;
  $stmt = $pdo->prepare("INSERT INTO productos (Nombre, Precio, Stock) VALUES (?, ?, ?)");
  $stmt->execute([$name, $price, $stock]);
  echo "<div class='alert alert-success'>✅ Producto agregado correctamente.</div>";
  //header("Location: index.php");
  //exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Agregar producto</title>
</head>

<body>
  <h2>Nuevo producto</h2>
  <form method="POST">
    <div class="mb-3 col-sm-6">
      <label class="form-label">Nombre:</label>
      <input class="form-control" type="text" name="nombre" required>
    </div>

    <div class="mb-3 col-sm-3">
      <label class="form-label">Precio:</label>
      <input class="form-control" type="number" step="0.01" name="precio" required>
    </div>

    <div class="mb-3 col-sm-6">
      <label class="form-label">Stock:</label>
      <input class="form-control" type="number" step="1" name="stock" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php" class="btn btn-secondary">⬅️ Volver al listado</a>
  </form>
 

  <?php
 include 'footer.php';
  ?>