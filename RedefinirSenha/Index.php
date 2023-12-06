<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body class="">
    <div class="w-100 mt-5">
        <h3 class="text-center">Insira seu email ou usuário para recuperação de sua senha:</h3>
    </div>
    <div class="container mt-5" >
        <div class="w-100 d-flex justify-content-center">
            <form id="form_recuperar_senha" class="w-50" action="" method="post">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="Email_Usuario" class="form-label">Usuário ou Email</label>
                        <input
                            type="text"
                            class="form-control"
                            name="Login"
                            id="Email_Usuario"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <small id="helpId" class="form-text text-muted">Insira acima seu usuário ou email</small>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" type="button">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>