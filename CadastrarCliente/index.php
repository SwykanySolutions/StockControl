<?php require_once($_SERVER["DOCUMENT_ROOT"]."/StockControl/components/VerifyLogin/index.php"); ?>
<?php $PAGE = "cadastrarcliente"; ?>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Navbar/index.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <div class="w-100 d-flex justify-content-center">
        <div class="container mt-5" >
            <h2 class="text-center mb-5" >Boas vindas ao cadastro de Clientes</h2>
            <h3 class="text-center mb-5" >Para cadastrar um cliente informe os dados abaixo:</h3>
            <form action="/StockControl/server/Requests/cadastrar_clientes/" method="post">
                <div class="row" >
                    <div class="mb-3 col-6">
                      <label for="nome" class="form-label">Nome do cliente</label>
                      <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelpId" placeholder="josefina luciana" required>
                      <small id="nomeHelpId" class="form-text text-muted">Digite o nome do cliente.</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="sobrenome" class="form-label">Sobrenome</label>
                      <input type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="sobrenomeHelpId" placeholder="ex Santos Silva" required>
                      <small id="sobrenomeHelpId" class="form-text text-muted">Digite o sobrenome do cliente.</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="data-de-nascimento" class="form-label">Data de nascimento</label>
                      <input type="date" class="form-control" name="data-de-nascimento" id="data-de-nascimento" aria-describedby="datadenascimentoHelpId" required>
                      <small id="datadenascimentoHelpId" class="form-text text-muted">Digite a data de nascimento do cliente.</small>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="cpf" class="form-label">Cpf</label>
                      <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelpId" placeholder="123.123.123-12">
                      <small id="cpfHelpId" class="form-text text-muted">Digite o cpf do cliente</small>
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