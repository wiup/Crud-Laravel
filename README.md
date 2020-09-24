# Crud-Laravel

Esse projeto consiste um sistema de gerenciamento de empresas feito inteiramente com **Laravel** e **Docker**, que foi projetado apenas para fins de estudos. 
### Objetivo do projeto
Crud-Laravel é um simples crud de gerenciamento de empresas e funcionários, que tem como finalidade cadastrar novas empresas e seus respectivos funcionários.

Funcionalidade do Crud-Laravel:

* Adição de novos funcionários e empresas
* Consulta (ambos)
* Edição (ambos)
* Remoção (ambos)

###Pré-Requisitos
Para rodar o projeto é necessário ter instalado em seu computador o **Docker**:

Link do Docker: [Docker-installer](https://www.docker.com/get-started)

### Como executá-lo?

Primeiramente faça o clone do nosso repositorio do projeto:
```
  git clone https://github.com/wiup/Crud-Laravel.git
```
Agora basta acessar usando um terminal a pasta do laradock que fica localizado dentro do Crud-Laravel:
```
    cd Crud-Laravel/laradock
```
Após entrar no laradock basta executar o seguinte comando para iniciar o projeto:
```
    docker-compose up -d nginx mysql
```

Pronto agora o projeto já está funcionando e tudo que você precisa fazer é acessar no seu navegador o **localhost:80**. No entanto, ainda precisamos de mais algumas configurações para poder logar no **Crud**, já que ainda não possuímos o banco de dados com o usuários admin@admin.com.

O primeiro passo para gerar o banco é acessando o terminal interno do nosso laradock, para fazer isso basta executar o seguinte comando:
```
    Docker exec -it crud_workspace_1 sh
```
Agora basta executar os seguintes comandos para criar o banco de dados:
```
    php artisan migrate
```

Para criar o primeiro usuário digite:
```
    php artisan db:seed
```

Agora tudo está funcionando corretamente!

Login e senha para acessar o sistema:
* Usuário: admin@admin.com
* Senha: password
