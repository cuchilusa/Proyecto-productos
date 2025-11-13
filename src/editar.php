<?php
require_once "config.php";
include "header.php";

// Si no viene el ID en la URL
if (!isset($_GET['id'])) {
    die("❌ ID no proporcionado.");
}

$id = $_GET['id'];

// Si se envió el formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $precio   = $_POST['precio'];
    $stock   = $_POST['stock'];

    $stmt = $pdo->prepare("UPDATE productos SET Nombre = ?, Precio = ?, Stock = ? WHERE id = ?");
    $stmt->execute([$nombre, $precio, $stock, $id]);
    echo "<p style='color:green;'>✅ Producto actualizado correctamente.</p>";
 
}

// Obtener los datos actuales
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch();

if (!$producto) {
    die("❌ Producto  no encontrado.");
}
?>

<h2>Editar producto</h2>

<form method="POST" action="">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $producto['Nombre'] ?>" required><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" value="<?= $producto['Precio'] ?>" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" min="0" value="<?= $producto['Stock'] ?>" required><br><br>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

<br>
<a href="index.php" class="btn btn-secondary">⬅️ Volver al listado</a>
<?php include "footer.php";?>

