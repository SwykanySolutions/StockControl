<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
        <div class="container w-50">
            <h2 class="text-center mb-5" >Faça o Login abaixo:</h2>
            <form  class="" action="/StockControl/server/Auth/login/index.php" method="post">
                <div class="row">
                    <div class="mb-3 col-12 ">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" name="login" id="login" aria-describedby="loginHelpId" placeholder="ex Asraklen ou teste@teste.com" required>
                        <small id="loginHelpId" class="form-text text-muted">Insira sua senha</small>
                    </div>
                    <div class="mb-3 col-12 ">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" aria-describedby="senhaHelpId" placeholder="**************"required>
                        <small id="senhaHelpId" class="form-text text-muted">Informe a mesma senha informada anteriormente</small>
                    </div>
                    <div class="mb-3 col-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="manter-se-conectado" id="manter-se-conectado">
                            <label class="form-check-label" for="manter-se-conectado">
                                Manter-se conectado
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-7">
                        <p class="text-end" >Ainda não é cadastrado? clique <a href="/StockControl/registro/">aqui</a>.</p>
                    </div>
                    <div class="w-100 d-flex justify-content-center" >
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>