SISTEMA DE GERENCIAMENTO DE FUNCIONÁRIOS

REQUISITOS
- PHP 8 ou superior
- MySQL
- Apache (XAMPP recomendado)
- Extensão PDO MySQL habilitada

COMO EXECUTAR
1. Coloque a pasta Prova-19-11 dentro da pasta htdocs do XAMPP.
2. Inicie Apache e MySQL pelo painel do XAMPP.
3. Acesse http://localhost/phpmyadmin.
4. Importe o arquivo banco.sql para criar o banco e a tabela.
5. Se necessário, altere usuário e senha do MySQL em config/conexao.php.
   Padrão do XAMPP: usuário root e senha vazia.
6. Abra http://localhost/Prova-19-11/.

FUNCIONALIDADES
- Cadastro e listagem de funcionários.
- Exclusão com confirmação via formulário POST.
- Bônus de 5% para funcionário comum e 15% para gerente.
- Sessão com nome do operador e opção de encerramento.
- Persistência dos dados no MySQL.

ESTRUTURA
models/       Classes POO
views/        Interface HTML e CSS
controllers/  Processamento das operações
config/       Conexão PDO
index.php     Entrada do sistema
banco.sql     Criação do banco e tabela