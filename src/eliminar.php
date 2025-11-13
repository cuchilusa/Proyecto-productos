<?php
require_once "config.php";


if (!isset($_POST['id'])) {
    die("❌ ID no proporcionado.");
}

$id = $_POST['id'];

// Ejecutar la eliminación
$stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
$stmt->execute([$id]);

// Redirigir al listado
header("Location: index.php");
exit;
