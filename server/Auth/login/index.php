<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location:/StockControl/login/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $login = filter_input(INPUT_POST,"login", FILTER_DEFAULT);
    $password = filter_input(INPUT_POST,"senha", FILTER_DEFAULT);
    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $SQL = "SELECT * FROM usuario WHERE usuario = :lg";
    } else {
        $SQL = "SELECT * FROM usuario WHERE email = :lg";
    }
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":lg", $login, PDO::PARAM_STR);
    if(!$stmt->execute()) {
        header("Location:/StockControl/login/");
        exit();
    }
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($password, $result["senha"])) {
        header("Location:/StockControl/login/");
        exit();
    }
    session_start();
    $_SESSION["user"] = $result["usuario"];
    $_SESSION["data-de-nascimento"] = $result["data-de-nascimento"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["nome"] = $result["nome"];
    $_SESSION["sobrenome"] = $result["sobrenome"];
    $_SESSION[""] = $result[""];
    header("Location:/StockControl/");
    exit();
} catch (\Throwable $th) {
    echo $th->getMessage();
    header("Location:/StockControl/login/");
    exit();
    //throw $th;
}