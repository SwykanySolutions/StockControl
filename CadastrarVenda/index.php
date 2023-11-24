<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "cadastrarvenda"; ?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <div class="w-100 d-flex justify-content-center" >
        <div class="container mt-5" >
            <h2 class="text-center mb-5" >Boas vindas ao sistema de cadastro de vendas</h2>
            <?php 
                require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/server/Conexao/conectar.php");
                $stmt = $conexao->query("SELECT * FROM produto ORDER BY id_produto ASC");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt1 = $conexao->query("SELECT * FROM cliente ORDER BY id_cliente ASC");
                $stmt1->execute();
                $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                if($result != null ){
                    if($result1 != null ){
                 ?>
                    <form action="/StockControl/server/Requests/cadastrar_vendas/" method="post">
                        <div class="row" >
                            <div class="col-6 mb-3" >
                                <label for="id_produto" class="form-label">Produto</label>
                                <select class="form-select form-select-md" name="id_produto" id="id_produto">
                                    <option selected disabled >Selecione um produto</option>
                                    <?php foreach($result as $row): ?>
                                    <option value="<?=$row["id_produto"]?>"><?=$row["nome"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3" >
                                <label for="id_cliente" class="form-label">Cliente</label>
                                <select class="form-select form-select-md" name="id_cliente" id="id_cliente">
                                    <option selected disabled >Selecione um cliente</option>
                                    <?php foreach($result1 as $row1): ?>
                                    <option value="<?=$row1["id_cliente"]?>"><?=$row1["nome"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3" >
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" name="quantidade" id="quantidade" aria-describedby="quantidadehelpId" placeholder="">
                                <small id="quantidadehelpId" class="form-text text-muted">Informe a quantidade de produtos da venda.</small>
                            </div>
                            <div class="col-6 mb-3" >
                                <label for="data-da-compra" class="form-label">Data da compra</label>
                                <input type="date"
                                class="form-control" name="data-da-compra" id="data-da-compra" aria-describedby="datehelpId" placeholder="">
                                <small id="datehelpId" class="form-text text-muted">Informe a data da compra</small>
                            </div>
                            <div class="w-100 d-flex justify-content-center" >
                                <button type="submit" class="btn btn-primary" >Cadastrar</button>
                            </div>
                        </div>
                    </form>
                 <?php 
                    }  else { ?>
                    <H2 class="text-center mb-5" >Não há clientes cadastrados por favor cadastre o cliente</H2>
                    <h4 class="text-center" >Para cadastrar um cliente clique <a href="/StockControl/CadastrarCliente/">aqui</a>.</h4>    
            <?php 
                    } 
                } else { 
            ?>
                    <H2 class="text-center mb-5" >Não há produtos cadastrados por favor cadastre um produto</H2>
                    <h4 class="text-center" >Para cadastrar um produto clique <a href="/StockControl/CadastrarProduto/">aqui</a>.</h4> 
            <?php
                } 
            ?>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>