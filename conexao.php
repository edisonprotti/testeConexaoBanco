<?php
// Código limpo e sem espaços fantasmas para o Railway
$servidor = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$db = getenv('MYSQLDATABASE') ?: 'aulaphp';
$port = getenv('MYSQLPORT') ?: '3306';

try {
    $dsn = "mysql:host={$servidor};port={$port};dbname={$db};charset=utf8mb4";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    exit;
}
?>
