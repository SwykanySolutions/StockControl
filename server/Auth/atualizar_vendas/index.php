<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/CadastrarVenda/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_venda = filter_input(INPUT_POST,"id_venda", FILTER_SANITIZE_NUMBER_INT);
    $id_produto = filter_input(INPUT_POST,"id_produto", FILTER_SANITIZE_NUMBER_INT);
    $id_cliente = filter_input(INPUT_POST,"id_cliente", FILTER_SANITIZE_NUMBER_INT);
    $data_da_venda = filter_input(INPUT_POST,"data-da-compra", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST,"quantidade", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "UPDATE venda SET id_produto = :id_produto , id_cliente = :id_cliente, data_da_venda = :data_da_venda, quantidade = :quantidade WHERE id_venda = :id_venda";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_venda", $id_venda, PDO::PARAM_INT);
    $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(":data_da_venda", $data_da_venda, PDO::PARAM_STR);
    $stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location:/StockControl/");
        exit();
    }
    header("Location:/StockControl/");
    exit();

} catch (\Throwable $th) {
    echo "erro ao cadastrar a venda". $th->getMessage();
    header("Location:/StockControl/");
    exit();
    //throw $th;
}