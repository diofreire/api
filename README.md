Entrevista - Serasa BackEnd PHP

## Tecnologias adotadas
#### PHP 7.4.7

#### MySql 15.1
Criei três base de dados, conforme o enunciado. Escolhi o MySql por ser um SGDB conhecido, rápido e que suporta
grandes banco de dados. Certo que há no mercado SGDB melhores, porém para fim desse teste queria algo rápido e fácil

## Arquitetura utilizada

#### API REST

A API foi criada sem nenhum framework, utilizando PHP puro para esse teste.
Entende que, pelo problema apresentado, os dados viriam de várias fontes de dados,
tendo o sistema que consumir os dados. Por esse motivo ao escolher criar a API foi pensado
na facilidade de consumo e implementação.

Por falta de tempo, não foi completamente implementada para consumo das três bases de dados.
O ideial seria, ainda, criar controllers e modularizar ainda mais o consumo no CRUD.

#### POO

Apesar de não utilizar nenhum framework, segui POO, de certo modo.

## Dados armazenados (já listados ou que você acrescentaria)

A príncipo não acresentaria nenhum dado armazenado. 
Acredito que os informados já ajudaram na execução do teste.

--------------------------------------------------------------------------------
## Preparação

Para executar o código criado, foi executado em localhost e segui os seguintes passos

``` criar pasta api/api
git clone https://github.com/diogoasus/api.git
```

``` criar banco de dados
file banco.sql
```

## Execução
``` localhost
- read
http://localhost/api/api/read.php

- create
http://localhost/api/api/create.php

- update
http://localhost/api/api/update.php

- delete
http://localhost/api/api/delete.php
```