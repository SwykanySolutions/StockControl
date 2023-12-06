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
                        <small id="loginHelpId" class="form-text text-muted">Insira seu login</small>
                    </div>
                    <div class="mb-3 col-12 ">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" aria-describedby="senhaHelpId" placeholder="**************"required>
                        <small id="senhaHelpId" class="form-text text-muted">Informe a sua senha</small>
                    </div>
                    <div class="mb-3 col-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="manter-se-conectado" id="manter-se-conectado">
                            <label class="form-check-label" for="manter-se-conectado">
                                Manter-se conectado
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-7 d-flex justify-content-end">
                       <a href="/StockControl/RedefinirSenha/">Esqueceu sua senha?</a>
                    </div>
                    <div class="w-100 d-flex justify-content-center" >
                        <button type="submit" class="btn btn-primary ps-5 pe-5 pt-2 pb-2">Login</button>
                    </div>
                    <div class="col mt-3 d-flex justify-content-center">
                        <span class="">Ainda não é cadastrado? Cadastre-se <a href="/StockControl/registro/">Aqui</a>.</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>