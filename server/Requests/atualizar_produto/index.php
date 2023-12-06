<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/Estoque/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_produto = filter_input(INPUT_POST,"id_produto", FILTER_SANITIZE_NUMBER_INT);
    $codigo_de_barras = filter_input(INPUT_POST,"codigo-de-barras", FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST,"categoria", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $empresa = filter_input(INPUT_POST,"empresa", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST,"tipo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $marca = filter_input(INPUT_POST,"marca", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST,"quantidade", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "UPDATE produto SET  codigo_de_barras = :codigo_de_barras, nome = :nome, categoria = :categoria, empresa = :empresa, tipo = :tipo, marca = :marca, quantidade = :quantidade WHERE id_produto = :id_produto";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
    $stmt->bindParam(":codigo_de_barras", $codigo_de_barras, PDO::PARAM_STR);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
    $stmt->bindParam(":empresa", $empresa, PDO::PARAM_STR);
    $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
    $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
    $stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location: /StockControl/Estoque/?atualizar=1");
        exit();
    }
    header("Location: /StockControl/Estoque/?atualizar=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao atualizar o produto". $th->getMessage();
    header("Location: /StockControl/Estoque/?atualizar=0");
    exit();
    //throw $th;
}