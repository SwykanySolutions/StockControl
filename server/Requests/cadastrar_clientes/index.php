<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/CadastrarCliente/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST,"sobrenome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data_de_nascimento = filter_input(INPUT_POST,"data-de-nascimento", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST,"cpf", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $SQL = "INSERT INTO cliente ( nome, sobrenome, data_de_nascimento, cpf ) VALUES ( :nome, :sobrenome, :data_de_nascimento, :cpf )";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
    if(!$stmt->execute()){
        header("Location:/StockControl/CadastrarCliente/?cadastro=1");
        exit();
    }
    header("Location:/StockControl/CadastrarCliente/?cadastro=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao cadastrar o cliente". $th->getMessage();
    header("Location:/StockControl/CadastrarCliente/?cadastro=0");
    exit();
    //throw $th;
}