<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "estoque"; ?>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
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
            $SQL = "SELECT * FROM produto ORDER BY id_produto ASC";
            $stmt = $conexao->prepare($SQL);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result != null) {
        ?>
        <h4 class="text-center mb-3" > Tabela de Produtos</h4>
        <div class="w-100 d-flex justify-content-center">
            <div class="table-responsive" > 
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Código de barras</th>
                            <th scope="col">Nome produto</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) { ?>
                        <tr>
                            <td scope="col"><?=$row["codigo_de_barras"]?></td>
                            <td scope="col"><?=$row["nome"]?></td>
                            <td scope="col"><?=$row["categoria"]?></td>
                            <td scope="col"><?=$row["empresa"]?></td>
                            <td scope="col"><?=$row["tipo"]?></td>
                            <td scope="col"><?=$row["marca"]?></td>
                            <td scope="col"><?=$row["quantidade"]?></td>
                            <td scope="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterarProdutoId<?=$row["id_produto"]?>">
                                    Alterar
                                </button>
                            </td>
                            <td scope="col">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluirProdutoId<?=$row["id_produto"]?>">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>

            <?php foreach ($result as $row) { ?>
                <div class="modal fade" id="modalAlterarProdutoId<?=$row["id_produto"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Alerar Dados</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="/StockControl/server/Requests/atualizar_produto/" method="post">
                            <input class="d-none" type="number" value="<?=$row["id_produto"]?>" name="id_produto" id="id_produto" required >
                            <div class="row" >
                                <div class="mb-3 col-6">
                                    <label for="codigo-de-barras" class="form-label">Código de barras</label>
                                    <input value="<?=$row["codigo_de_barras"]?>" type="number" class="form-control" name="codigo-de-barras" id="codigo-de-barras" aria-describedby="codigoHelpId" placeholder="546456454564564" required >
                                    <small id="codigoHelpId" class="form-text text-muted">Digite o código de barras</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="nome" class="form-label">Nome Produto</label>
                                    <input value="<?=$row["nome"]?>" type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelpId" placeholder="ex Sintonia Max" required >
                                    <small id="nomeHelpId" class="form-text text-muted">Digite o nome do produto</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="categoria" class="form-label">Categoria</label>
                                    <input value="<?=$row["categoria"]?>" type="text" class="form-control" name="categoria" id="categoria" aria-describedby="categoriaHelpId" placeholder="Max" required >
                                    <small id="categoriaHelpId" class="form-text text-muted">Digite a categoria do produto</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="empresa" class="form-label">Empresa</label>
                                    <input value="<?=$row["empresa"]?>" type="text" class="form-control" name="empresa" id="empresa" aria-describedby="empresaHelpId" placeholder="Natura" required >
                                    <small id="empresaHelpId" class="form-text text-muted">Digite o nome da empresa</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="tipo" class="form-label">Tipo</label>
                                    <input value="<?=$row["tipo"]?>" type="text" class="form-control" name="tipo" id="tipo" aria-describedby="tipoHelpId" placeholder="Desodorante" required >
                                    <small id="tipoHelpId" class="form-text text-muted">Digite o tipo do produto</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="marca" class="form-label">Marca</label>
                                    <input value="<?=$row["marca"]?>" type="text" class="form-control" name="marca" id="marca" aria-describedby="marcaHelpId" placeholder="Kaiak" required >
                                    <small id="marcaHelpId" class="form-text text-muted">Digite a marca do produto</small>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="quantidade" class="form-label">Quantidade</label>
                                    <input value="<?=$row["quantidade"]?>" type="number" class="form-control" name="quantidade" id="quantidade" aria-describedby="quantidadeHelpId" placeholder="10" required >
                                    <small id="quantidadeHelpId" class="form-text text-muted">Digite a quantidade de produtos</small>
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
            <?php } ?>

            <?php foreach ($result as $row ) { ?>
                <div class="modal fade" id="modalExcluirProdutoId<?=$row["id_produto"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Dados</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Deseja mesmo excluir o produto <?=$row["nome"]?>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="/StockControl/server/Requests/excluir_produto/" method="post">
                                <input class="d-none" type="number" value="<?=$row["id_produto"]?>" name="id_produto" id="id_produto">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } else { ?>
            <h4 class="text-center mb-5 text-danger" >Não há Produtos cadastrados.</h4>
        <?php } ?>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>