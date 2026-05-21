<?php
// Código corrigido com as aspas obrigatórias para strings
$servidor = 'mysql.railway.internal';
$user = 'root';
$pass = 'qvaBoMQcaojxgfFXUzWRkwZqOTvMxurd';
$db = 'railway';
$port = '3306'; // Mantenha 3306 se for a porta interna do Railway

try {
    $dsn = "mysql:host={$servidor};port={$port};dbname={$db};charset=utf8mb4";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    exit;
}
?>
