<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/Cliente/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_cliente = filter_input(INPUT_POST,"id_cliente", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "DELETE FROM cliente WHERE id_cliente= :id_cliente";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location: /StockControl/Cliente/?excluir=1");
        exit();
    }
    header("Location: /StockControl/Cliente/?excluir=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao excluir o cliente". $th->getMessage();
    header("Location: /StockControl/Estoque/?excluir=0");
    exit();
    //throw $th;
}