<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/registro/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST,"sobrenome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data_de_nascimento = filter_input(INPUT_POST,"data-de-nascimento", FILTER_DEFAULT);
    $cpf = filter_input(INPUT_POST,"cpf", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usuario = filter_input(INPUT_POST,"usuario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
    $senha = password_hash( filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_DEFAULT );
    $nivel = filter_input(INPUT_POST,"nivel", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "INSERT INTO usuario ( nome, sobrenome, data_de_nascimento, cpf, usuario, email, senha, nivel ) VALUES ( :nome, :sobrenome, :data_de_nascimento, :cpf, :usuario, :email, :senha, :nivel )";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
    $stmt->bindParam(":nivel", $nivel, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location: /StockControl/registro/");
        exit();
    }
    header("Location: /StockControl/login/");
    exit();
} catch (\Throwable $th) {
    echo"Erro ao cadastrar". $th->getMessage()."";
    header("Location: /StockControl/registro/");
    exit();
    //throw $th;
}




?>