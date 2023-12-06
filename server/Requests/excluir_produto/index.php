<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/Estoque/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_produto = filter_input(INPUT_POST,"id_produto", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "DELETE FROM produto WHERE id_produto= :id_produto";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location: /StockControl/Estoque/?excluir=1");
        exit();
    }
    header("Location: /StockControl/Estoque/?excluir=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao excluir o produto". $th->getMessage();
    header("Location: /StockControl/Estoque/?excluir=0");
    exit();
    //throw $th;
}