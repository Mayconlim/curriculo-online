# Passo-a-passo para executar
1. Baixe e instale o XAMPP
2. Depois de instalado, copie/mova a pasta do site (curriculo-online) para dentro da pasta "htdocs" que está dentro da pasta de instalação do XAMPP (renomeie o nome da pasta para "curriculo-online", se estiver diferente)
3. Abra o painel de controle do XAMPP (xampp-control.exe) e clique em start em "Apache" e "MySQL"
4. Espere até que os dois módulos estejam rodando e depois clique em admin de "MySQL"
5. Ao abrir a página do phpMyAdmin, crie um novo banco de dados clicando em "Novo" no menu lateral esquerdo

**ATENÇÃO**: nos passos abaixo, é importante manter os nomes do banco de dados, tabela e campos iguais aos informados para que não ocorra erro quando o PHP do site realizar requisições ao banco de dados.

6. Dê o nome "users" ao banco de dados e clique em "Criar"
7. Dê o nome "registered" a tabela e digite no número de 4 colunas clique em "Criar"
8. Preencha os campos conforme a tabela abaixo:

| NOME     | TIPO    | TAMANHO/VALORES | ÍNDICE  | A_I     |
| -------- | ------- | --------------- | ------  | ------- |
| id       | INT     |		           | PRIMARY | ☑      | 
| name     | VARCHAR |	40             |         |         |
| email    | VARCHAR |	40			   | UNIQUE  |         |
| password | VARCHAR |	40             |         |         |

9. Em motor de armazenamento, selecione "MyISAM"
10. Clique em guardar
11. Pronto, com o banco de dados foi configurado, agora vamos criar um usuário para acessar o sistema
12. Clique na aba "SQL" e insira o seguinte comando trocando os campos entre aspas simples('') por dados do usuário. Exemplo:
```sql
insert into registered (name, email, password) values ('João', 'admin@admin.com', '123456');
```
13. Clique em Continuar
14. Abra o seu navegador, digite a URL: localhost/curriculo-online
15. Com o site aberto, tente logar com e-mail e senha cadastrados no banco de dados