
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
git clone git@github.com:vlucas/phpdotenv.git

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
## Referências

### Frameworks
 - [Bootstrap ](https://getbootstrap.com/)

### Bibliotecas
 - [PHPDotenv](https://github.com/vlucas/phpdotenv)
## Licença

[MIT](https://choosealicense.com/licenses/mit/)

