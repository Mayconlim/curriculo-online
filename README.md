# Passo-a-passo para executar
1. Baixe e instale o XAMPP
2. Depois de instalado, copie/mova a pasta do site (curriculo-online) para dentro da pasta "htdocs" que está dentro da pasta de instalação do XAMPP (renomeie o nome da pasta para "curriculo-online", se estiver diferente)
3. Abra o painel de controle do XAMPP (xampp-control.exe) e clique em start em "Apache" e "MySQL"
4. Espere até que os dois módulos estejam rodando e depois clique em admin de "MySQL"
5. Ao abrir a página do phpMyAdmin, crie um novo banco de dados clicando em "Novo" no menu lateral esquerdo
6. Dê o nome "users" ao banco de dados e clique em "Criar"
7. Vá na aba "Importar" no menu superior
8. Em "Ficheiro a importar" clique em "Escolher Arquivo" e selecione o arquivo "users.sql" que está na pasta raiz do projeto
9. Desça a página até o final e clique no botão "Importar"
10. Pronto, com o banco de dados foi configurado
11. Abra o seu navegador, digite a URL: localhost/curriculo-online
12. Com o site aberto, você pode cadastrar um usuário e posteriormente logar com e-mail e senha cadastrados