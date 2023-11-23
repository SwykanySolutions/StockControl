<?php
require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']."/StockControl/");
$dotenv->load();

$host = $_ENV["HOSTNAME"];
$port = $_ENV["PORT"];
$dbname = $_ENV["DB_NAME"];
$user = $_ENV["USERNAME"];
$pass = $_ENV["PASSWORD"];
try {
    $conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
    exit;
}