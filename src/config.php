<?php

$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //PDO lanzará una excepción (PDOException) si ocurre un error, en lugar de simplemente devolver false o emitir un warning.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //cada fila devuelta será un array asociativo, con los nombres de columnas como claves.
    PDO::ATTR_EMULATE_PREPARES => false, //usa sentencias preparadas nativas del motor de la base de datos.
];

/*PHP intenta crear una conexión a la base de datos usando PDO.

Si algo falla (usuario o contraseña incorrectos, base inexistente, etc.),
se lanza una excepción (PDOException).*/
//Cuando un código “lanza” una excepción, significa que detiene lo normal que estaba haciendo y envía esa señal de error al programa. Entonces el programa deje de ejecutar la parte normal hasta que alguien maneje el error.

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Devuelve una instancia PDO

} catch (PDOException $e) {
    // En producción no muestres errores así porque $e->getMessage() puede contener información sensible o técnica que un atacante podría aprovechar.
    die("Error de conexión: " . $e->getMessage());

    /* en producción sería...
    error_log($e->getMessage()); // Guarda el error en el log de PHP o en src/logs/app.log
    die("Error interno. Intente más tarde."); // Mensaje genérico al usuario*/
}
