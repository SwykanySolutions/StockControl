<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "cadastrarproduto"; ?>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <div class="w-100 d-flex justify-content-center">
        <div class="container mt-5" >
            <h2 class="text-center mb-5" >Boas vindas ao cadastro de Produtos</h2>
            <h3 class="text-center mb-5" >Para cadastrar um produto informe os dados abaixo:</h3>
            <form action="/StockControl/server/Requests/cadastrar_produtos/" method="post">
                <div class="row" >
                    <div class="mb-3 col-6">
                      <label for="codigo-de-barras" class="form-label">Código de barras</label>
                      <input type="number" class="form-control" name="codigo-de-barras" id="codigo-de-barras" aria-describedby="codigoHelpId" placeholder="546456454564564">
                      <small id="codigoHelpId" class="form-text text-muted">Digite o código de barras</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="nome" class="form-label">Nome Produto</label>
                      <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelpId" placeholder="ex Sintonia Max">
                      <small id="nomeHelpId" class="form-text text-muted">Digite o nome do produto</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="categoria" class="form-label">Categoria</label>
                      <input type="text" class="form-control" name="categoria" id="categoria" aria-describedby="categoriaHelpId" placeholder="Max">
                      <small id="categoriaHelpId" class="form-text text-muted">Digite a categoria do produto</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="empresa" class="form-label">Empresa</label>
                      <input type="text" class="form-control" name="empresa" id="empresa" aria-describedby="empresaHelpId" placeholder="Natura">
                      <small id="empresaHelpId" class="form-text text-muted">Digite o nome da empresa</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="tipo" class="form-label">Tipo</label>
                      <input type="text" class="form-control" name="tipo" id="tipo" aria-describedby="tipoHelpId" placeholder="Desodorante">
                      <small id="tipoHelpId" class="form-text text-muted">Digite o tipo do produto</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="marca" class="form-label">Marca</label>
                      <input type="text" class="form-control" name="marca" id="marca" aria-describedby="marcaHelpId" placeholder="Kaiak">
                      <small id="marcaHelpId" class="form-text text-muted">Digite a marca do produto</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="quantidade" class="form-label">Quantidade</label>
                      <input type="number" class="form-control" name="quantidade" id="quantidade" aria-describedby="quantidadeHelpId" placeholder="10">
                      <small id="quantidadeHelpId" class="form-text text-muted">Digite a quantidade de produtos</small>
                    </div>
                    <div class="w-100 d-flex justify-content-center" >
                        <button type="submit" class="btn btn-primary" >Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>