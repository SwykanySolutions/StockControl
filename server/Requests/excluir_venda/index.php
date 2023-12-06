<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /StockControl/");
    exit();
}
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
    $id_venda = filter_input(INPUT_POST,"id_venda", FILTER_SANITIZE_NUMBER_INT);
    $SQL = "DELETE FROM venda WHERE id_venda= :id_venda";
    $stmt = $conexao->prepare($SQL);
    $stmt->bindParam(":id_venda", $id_venda, PDO::PARAM_INT);
    if(!$stmt->execute()){
        header("Location: /StockControl/?excluir=1");
        exit();
    }
    header("Location:/StockControl/?excluir=2");
    exit();

} catch (\Throwable $th) {
    echo "erro ao excluir a venda". $th->getMessage();
    header("Location: /StockControl/?excluir=0");
    exit();
    //throw $th;
}