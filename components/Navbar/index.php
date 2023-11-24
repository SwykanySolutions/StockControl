<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/StockControl/">StockControl</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "home") ? "active" : ""?>" aria-current="page" href="/StockControl">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "cadastrarvenda") ? "active" : ""?>" href="/StockControl/CadastrarVenda">Cadastrar Venda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "estoque") ? "active" : ""?>" href="/StockControl/Estoque">Estoque</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "cadastrarproduto") ? "active" : ""?>" href="/StockControl/CadastrarProduto">Cadastrar Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "cliente") ? "active" : ""?>" href="/StockControl/Cliente">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($PAGE == "cadastrarcliente") ? "active" : ""?>" href="/StockControl/CadastrarCliente">Cadastrar Cliente</a>
        </li>
        
      </ul>
    </div>
    <div>
        <ul class="navbar-nav">
          <li class="nav-item" ><a class="nav-link" href="/StockControl/server/Auth/logout/">Logout</a></li>
        </ul>
      </div>
  </div>
</nav>