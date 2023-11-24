
# StockControl

Uma aplicação web em php para controle de estoque e vendas.
## Instalação

Para instalar o projeto primeiro temos que clona-lo do github por ssh ou url.

### Observação
A clonagem via ssh, é necessario que o usuário crie uma chave pública ssh em sua conta, para realizar a clonagem do repositório.

```bash
## clonagem via url
git clone https://github.com/SwykanySolutions/StockControl.git

#clonagem via ssh
git clone git@github.com:SwykanySolutions/StockControl.git

cd StockControl
```

Ao final da clonagem e necessário instalar as bibliotecas e dependências da aplicação, ultilizando o gerenciador de dependencias [Composer](https://getcomposer.org/).
```bash
composer install
```
Após a instalação das dependencias o projeto estara pronto para ser ultilizado.

### Observação

Este projeto trabalha com variaveis de ambiente, para usa-lo em modo de desenvolvimento, altere as variaveis do arquivo .env localizado na raiz do projeto.

Lembrando que a ultilização do arquivo .env só é recomendada em ambiente de desenvolvimento para aplicar em um ambiente de produçãq é necessário que se cadastrem as variaveis de ambiente dentro do servidor onde a aplicação estará localizada.
## Funcionalidades

- Temas dark e light
- **Crud** produto
- **Crud** cliente
- **Crud** venda
- Vinculo de clientes a uma venda
- Atualização de quantidade de produtos automatica **(trigger)** feita no banco de dados

## Capturas de tela

### Login usuario
![Login](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/login.png?raw=true)

### Registro usuario
![Cadastro de usuario](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/registro.png?raw=true)

### Vendas
![Vendas](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/vendas.png?raw=true)

### Vendas sem venda
![Vendas sem venda](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/vendas_sem_vendas.png?raw=true)

### Estoque
![Estoque](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/estoque.png?raw=true)

### Estoque com produto
![Estoque com produto](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/estoque_com_produto.png?raw=true)

### Cadastrar venda
![Cadastrar venda](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/cadastrar_venda.png?raw=true)

### Cadastrar venda sem produtos
![Cadastrar venda sem produtos](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/cadastrar_venda_sem_produtos.png?raw=true)

### Cadastrar venda sem clientes
![Cadastrar venda sem clientes](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/cadastrar_venda_sem_clientes.png?raw=true)

### Cadastrar clientes
![Cadastrar clientes](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/cadastrar_cliente.png?raw=true)

### Clientes
![Cadastrar clientes](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/clientes.png?raw=true)

### Clientes com clientes
![Clientes com clientes](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/clientes_com_clientes.png?raw=true)

## Apresentação do sistema em vídeo
[![ControlStock Apresentação](https://github.com/SwykanySolutions/StockControl/blob/main/Public/PrintScreens/login.png?raw=true)](https://youtu.be/hqY0E7YuHbI)


## Informações importantes
- A aplicação foi desenvolvida e configurada para ultilização da mesma dentro da pasta StockControl na raiz (htdocs) do servidor.
- A pasta SQL contem um sql que é capaz de gerar o banco de dados base ultilizado para a criação e funcionamento do projeot.

## Referências

### Frameworks
 - [Bootstrap ](https://getbootstrap.com/)

### Bibliotecas
 - [PHPDotenv](https://github.com/vlucas/phpdotenv)
## Licença

[MIT](https://choosealicense.com/licenses/mit/)

