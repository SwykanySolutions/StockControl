<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "home"; ?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Alert_Atualizar_Excluir/index.php"); ?>
    <div class="container mt-5" >
        <h2 class="text-center mb-5" >Boas vindas ao StockControler.</h2>
        <h3 class="text-center mb-5" >Abaixo temos algumas informações sobre o sistema</h3>
        <?php

            $SQL = "SELECT * FROM venda ORDER BY id_venda ASC";
            /**
             * @var \PDO $conexao
             */
            $stmt = $conexao->prepare($SQL);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result != null) {
                $SQL_SELECT_CLIENTE = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
                $SQL_SELECT_PRODUTO = "SELECT * FROM produto WHERE id_produto = :id_produto";
                $stmt_cliente = $conexao->prepare($SQL_SELECT_CLIENTE);
                $stmt_produto = $conexao->prepare($SQL_SELECT_PRODUTO);
        ?>
        <h4 class="text-center mb-3" > Tabela de Vendas</h4>
        <div class="w-100 d-flex justify-content-center">
            <div class="table-responsive" > 
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Nome Completo do Cliente</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Data da Venda</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row){ 
                            $stmt_produto->bindParam(":id_produto",$row['id_produto'], PDO::PARAM_INT);
                            $stmt_cliente->bindParam(":id_cliente", $row["id_cliente"], PDO::PARAM_INT);
                            $stmt_cliente->execute();
                            $stmt_produto->execute();
                            $result_cliente = $stmt_cliente->fetch(PDO::FETCH_ASSOC);
                            $result_produto = $stmt_produto->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <tr>
                            <td scope="col"><?=$result_produto["nome"]?></td>
                            <td scope="col"><?=$result_cliente["nome"]." ".$result_cliente["sobrenome"]?></td>
                            <td scope="col"><?=$row["quantidade"]?></td>
                            <td scope="col"><?=(new DateTime($row["data_da_venda"]))->format("d/m/Y")?></td>
                            <td scope="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterarVendaId<?=$row["id_venda"]?>">
                                    Alterar
                                </button>
                            </td>
                            <td scope="col">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluirVendaId<?=$row["id_venda"]?>">
                                    Excluir
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAlterarVendaId<?=$row["id_venda"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Alerar Dados</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php 
                                        $stmt1 = $conexao->query("SELECT * FROM produto ORDER BY id_produto ASC");
                                        $stmt1->execute();
                                        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                        $stmt2 = $conexao->query("SELECT * FROM cliente ORDER BY id_cliente ASC");
                                        $stmt2->execute();
                                        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <form action="/StockControl/server/Requests/atualizar_vendas/" method="post">
                                            <input class="d-none" type="number" value="<?=$row["id_venda"]?>" name="id_venda" id="">
                                            <div class="row" >
                                                <div class="col-6 mb-3" >
                                                    <label for="id_produto" class="form-label">Produto</label>
                                                    <select class="form-select form-select-md" name="id_produto" id="id_produto">
                                                        <?php foreach($result1 as $row1){ ?>
                                                        <option <?=($row1["id_produto"] == $row["id_produto"]) ? "selected": ""?> value="<?=$row1["id_produto"]?>"><?=$row1["nome"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3" >
                                                    <label for="id_cliente" class="form-label">Cliente</label>
                                                    <select class="form-select form-select-md" name="id_cliente" id="id_cliente">
                                                        <?php foreach($result2 as $row2){ ?>
                                                        <option <?=($row2["id_cliente"] == $row["id_cliente"]) ? "selected": ""?> value="<?=$row2["id_cliente"]?>"><?=$row2["nome"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3" >
                                                    <label for="quantidade" class="form-label">Quantidade</label>
                                                    <input value="<?=$row["quantidade"]?>" type="number" class="form-control" name="quantidade" id="quantidade" aria-describedby="quantidadehelpId" placeholder="">
                                                    <small id="quantidadehelpId" class="form-text text-muted">Informe a quantidade de produtos da venda.</small>
                                                </div>
                                                <div class="col-6 mb-3" >
                                                    <label for="data-da-compra" class="form-label">Data da compra</label>
                                                    <input type="date" value="<?=$row["data_da_venda"]?>"
                                                    class="form-control" name="data-da-compra" id="data-da-compra" aria-describedby="datehelpId" placeholder="">
                                                    <small id="datehelpId" class="form-text text-muted">Informe a data da compra</small>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Alterar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalExcluirVendaId<?=$row["id_venda"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Dados</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja mesmo excluir a venda ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="/StockControl/server/Requests/excluir_venda/" method="post">
                                            <input class="d-none" type="number" value="<?=$row["id_venda"]?>" name="id_venda" id="id_venda">
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } else { ?>
            <h4 class="text-center mb-5 text-danger" >Não há vendas feitas.</h4>
        <?php } ?>
    </div>
    
    
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>