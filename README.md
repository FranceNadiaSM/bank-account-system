# **Bank-account-system**

Projeto Laravel, com banco de dados MySQL, que consiste num Sitema de Conta Bancária composo por um CRUD de cadastro para abertura de conta. <br/>
Foram utilizadas algumas validações nos input de dados como CPF e email. Além disso, foi usada uma função para geração de número de conta automático. 

O sistema conta com funcionalidades como Exibir saldo, Depósito, Saque e Relatório de transações ocorridas com seleção de período (Extrato).
<br/>
No dashboard contém alguns gráficos para exibir informações sobre a conta.

## instalação
```terminal
composer install
```
## Usage
Pode configurar os dados do banco no arquivo .env tem o .env.example para seguir como exemplo
```php
DB_DRIVER=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=simpleshotel
DB_USERNAME=postgres
DB_PASSWORD=password
```

Usuario e senha de acesso
```php
usuario: teste@simpleshotel.com
senha: 123456
```

#### **Bank-account-system**
##### **Template AdimLTE 3**
![System Bank](systemBank1.png)

![System Bank](systemBank2.png)
