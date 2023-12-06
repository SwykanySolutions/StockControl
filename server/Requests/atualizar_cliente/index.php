<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/Cliente/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_cliente = filter_input(INPUT_POST,"id_cliente", FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST,"sobrenome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data_de_nascimento = filter_input(INPUT_POST,"data-de-nascimento", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST,"cpf", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $SQL = "UPDATE cliente SET nome = :nome, sobrenome = :sobrenome, data_de_nascimento = :data_de_nascimento, cpf = :cpf WHERE id_cliente = :id_cliente";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
    if(!$stmt->execute()){
        header("Location: /StockControl/Cliente/?atualizar=1");
        exit();
    }
    header("Location: /StockControl/Cliente/?atualizar=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao atualizar o cliente". $th->getMessage();
    header("Location: /StockControl/Cliente/?atualizar=0");
    exit();
    //throw $th;
}