<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/CadastrarVenda/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_produto = filter_input(INPUT_POST,"id_produto", FILTER_SANITIZE_NUMBER_INT);
    $id_cliente = filter_input(INPUT_POST,"id_cliente", FILTER_SANITIZE_NUMBER_INT);
    $data_da_venda = filter_input(INPUT_POST,"data-da-compra", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST,"quantidade", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "INSERT INTO venda ( id_produto, id_cliente, data_da_venda, quantidade ) VALUES ( :id_produto, :id_cliente, :data_da_venda, :quantidade )";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(":data_da_venda", $data_da_venda, PDO::PARAM_STR);
    $stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location:/StockControl/CadastrarVenda/?cadastro=1");
        exit();
    }
    header("Location:/StockControl/CadastrarVenda/?cadastro=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao cadastrar a venda". $th->getMessage();
    header("Location:/StockControl/CadastrarVenda/?cadastro=0");
    exit();
    //throw $th;
}