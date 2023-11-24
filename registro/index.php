<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Head/index.php"); ?>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Color/index.php"); ?>
    <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <h2 class="text-center" >Faça o Registro abaixo:</h2>
            <form action="/StockControl/server/Auth/registro/index.php" method="post">
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomehelpId" placeholder="" required>
                        <small id="nomehelpId" class="form-text text-muted">Insira seu nome</small>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="sobrenomehelpId" placeholder="" required>
                        <small id="sobrenomehelpId" class="form-text text-muted">Insira seu sobrenome</small>
                    </div>
                    <div class="mb-3 col-5">
                      <label for="data-de-nascimento" class="form-label">Data de nascimento</label>
                      <input type="date" class="form-control" name="data-de-nascimento" id="data-de-nascimento" aria-describedby="datahelpId" placeholder="" required>
                      <small id="datahelpId" class="form-text text-muted">Informe a data de nascimento</small>
                    </div>
                    <div class="mb-3 col-7">
                        <label for="cpf" class="form-label">Cpf</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfhelpId" placeholder="ex. 123.123.123-12" required>
                        <small id="cpfhelpId" class="form-text text-muted">Insira seu cpf</small>
                    </div>
                    <div class="mb-3 col-7">
                        <label for="usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuariohelpId" placeholder="ex. Asraklen" required>
                        <small id="usuariohelpId" class="form-text text-muted">Insira seu usuario</small>
                    </div>
                    <div class="mb-3 col-6 ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com" required>
                        <small id="emailHelpId" class="form-text text-muted">Insira seu email</small>
                    </div>
                    <div class="mb-3 col-6 ">
                        <label for="confirma-email" class="form-label">Confirma email</label>
                        <input type="email" class="form-control" name="confirma-emai" id="confirma-emai" aria-describedby="confirmaemailHelpId" placeholder="abc@mail.com"required>
                        <small id="confirmaemailHelpId" class="form-text text-muted">Informe o mesmo email informado anteriormente</small>
                    </div>
                    <div class="mb-3 col-6 ">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" aria-describedby="senhaHelpId" placeholder="*****************" required>
                        <small id="senhaHelpId" class="form-text text-muted">Insira sua senha</small>
                    </div>
                    <div class="mb-3 col-6 ">
                        <label for="confirma-senha" class="form-label">Confirma senha</label>
                        <input type="password" class="form-control" name="confirma-senha" id="confirma-senha" aria-describedby="confirmasenhaHelpId" placeholder="**************"required>
                        <small id="confirmasenhaHelpId" class="form-text text-muted">Informe a mesma senha informada anteriormente</small>
                    </div>
                    <div class="mb-3" >
                        <label for="nivel" class="form-label">Nível</label>
                        <select class="form-select form-select-md" name="nivel" id="nivel">
                            <option selected disabled>Selecioe um nível</option>
                            <option value="1">Usuário</option>
                            <option value="2">Adminstrador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <p class="text-end" >ja é cadastrado? clique <a href="/StockControl/login/">aqui</a>.</p>
                    </div>
                    <div class="w-100 d-flex justify-content-center" >
                        <button type="submit" class="btn btn-primary">Registro</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/StockControl/components/Body/index.php"); ?>
</body>
</html>