# Gerenciador BioMedCells
Gerenciador web e backend do aplicativo BioMedCells, que possibilita o cadastro dos conteúdos e gerenciamento dos usuários.

## Tecnologia
- Desenvolvido com a linguagem de programção PHP utilizando o Framework "AdiantiFramwork".
- Banco de dados utilizado é o MySQL, gerenciado através do phpMyAdmin. Mas tabelas padrões do framework, como a de usuários, estão cadastrados nos arquivos .db do SQLite na pasta "app/database".

## Como instalar
- Instale o WampServer e coloque o repositório do projeto na pasta 'C:\wamp64\www'.<br/>

- Clique com botão esquerdo no ícone do Wamp e escolha a opção "phpMyAdmin". Se pedir autenticação, normalmente o usuário é 'root' e a senha é vazia. Escolha como servidor o MySQL.<br/>

- Crie um novo banco de dados com o nome "biomedcells" e importe o arquivo que está nesse repositório, chamado "biomedcells_database.sql". Ele contém os dados iniciais do sistema.<br/>

- Crie um arquivo chamado .env e preencha com os dados do banco de dados, como
```
DB_HOST=localhost
DB_PORT=3306
DB_NAME=biomedcells
DB_USER=root
DB_PASS=
DB_TYPE=mysql
```
<br/>

- Instale o composer no seu computador e utilize o comando "composer install" no repositório do seu projeto para instalar as dependências necessárias.<br/>

- Com o serviço o wampp rodando, você pode acessar seu projeto pela URL "http://10.172.201.194/backend_biomedcells/", onde "10.172.201.194" é o seu endereço IPV4, que pode ser encontrado com o comando "ipconfig" no cmd, e o "backend_biomedcells" é nome da pasta do projeto.<br/>

- O usuário padrão de acesso está como "admin" e a senha como "admin".

## Autores
- Milton Althayde (Aluno de biomedicina, autor da ideia) <br/>
- Arthur Kenzo (Aluno de sistemas de informação, desenvolvedor) <br/>
- Carlos Alberto (Professor de Sistemas de Informação, orientador do Arthur) <br/>
- Carlos André (Professor de Biomedicina, orientador do Milton)