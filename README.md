# desafio-delta-global
Desafio da Delta Global

## Instalação

Tenha o composer instalado, é necessario atualizar o ambiente antes da execução, para isso na pasta raiz, execute no terminal, um dos comandos:

```
composer install
composer update
```
Após estes comando, configure um banco de dados no arquivo .env
    
Por fim, para iniciarmos execute os comandos em ordem:
```
php spark migrate
php spark db:seed AlunosSeeder
```
Inicie a aplicação
    
Acesse em http://localhost
    
Você provavelmente verá uma tela assim!

![Screenshot](screenshot.png)