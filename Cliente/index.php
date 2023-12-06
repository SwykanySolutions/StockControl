<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "cliente"; ?>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Alert_Atualizar_Excluir/index.php"); ?>
    <div class="container mt-5" >
        <h2 class="text-center mb-5" >Boas vindas ao StockControler.</h2>
        <h3 class="text-center mb-5" >Abaixo temos algumas informações sobre o sistema</h3>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/server/Conexao/conectar.php");
            $SQL = "SELECT * FROM cliente ORDER BY id_cliente ASC";
            $stmt = $conexao->prepare($SQL);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result != null) {
        ?>
        <h4 class="text-center mb-3" > Tabela de Clientes</h4>
        <div class="w-100 d-flex justify-content-center">
            <div class="table-responsive" > 
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome cliente</th>
                            <th scope="col">Sobrenome cliente</th>
                            <th scope="col">Data de nascimento</th>
                            <th scope="col">Cpf</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) { ?>
                        
                        <tr>
                            <td scope="col"><?=$row["nome"]?></td>
                            <td scope="col"><?=$row["sobrenome"]?></td>
                            <td scope="col"><?=(new DateTime($row["data_de_nascimento"]))->format("d/m/Y")?></td>
                            <td scope="col"><?=$row["cpf"]?></td>
                            <td scope="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterarClienteId<?=$row["id_cliente"]?>">
                                    Alterar
                                </button>
                            </td>
                            <td scope="col">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluirClienteId<?=$row["id_cliente"]?>">
                                    Excluir
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAlterarClienteId<?=$row["id_cliente"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Alerar Dados</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/StockControl/server/Requests/atualizar_cliente/" method="post">
                                        <input class="d-none" type="number" value="<?=$row["id_cliente"]?>" name="id_cliente" id="">
                                        <div class="row" >
                                            <div class="mb-3 col-6">
                                            <label for="nome" class="form-label">Nome do cliente</label>
                                            <input value="<?=$row["nome"]?>" type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelpId" placeholder="josefina luciana" required>
                                            <small id="nomeHelpId" class="form-text text-muted">Digite o nome do cliente.</small>
                                            </div>
                                            <div class="mb-3 col-6">
                                            <label for="sobrenome" class="form-label">Sobrenome</label>
                                            <input value="<?=$row["sobrenome"]?>" type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="sobrenomeHelpId" placeholder="ex Santos Silva" required>
                                            <small id="sobrenomeHelpId" class="form-text text-muted">Digite o sobrenome do cliente.</small>
                                            </div>
                                            <div class="mb-3 col-6">
                                            <label for="data-de-nascimento" class="form-label">Data de nascimento</label>
                                            <input value="<?=$row["data_de_nascimento"]?>" type="date" class="form-control" name="data-de-nascimento" id="data-de-nascimento" aria-describedby="datadenascimentoHelpId" required>
                                            <small id="datadenascimentoHelpId" class="form-text text-muted">Digite a data de nascimento do cliente.</small>
                                            </div>
                                            <div class="mb-3 col-6">
                                            <label for="cpf" class="form-label">Cpf</label>
                                            <input value="<?=$row["cpf"]?>" type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelpId" placeholder="123.123.123-12">
                                            <small id="cpfHelpId" class="form-text text-muted">Digite o cpf do cliente</small>
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

                        <div class="modal fade" id="modalExcluirClienteId<?=$row["id_cliente"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Dados</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja mesmo excluir o cliente <?=$row["nome"]?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="/StockControl/server/Requests/excluir_cliente/" method="post">
                                        <input class="d-none" type="number" value="<?=$row["id_cliente"]?>" name="id_cliente" id="id_cliente">
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
            <h4 class="text-center mb-5 text-danger" >Não há clientes cadastrados.</h4>
        <?php } ?>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>