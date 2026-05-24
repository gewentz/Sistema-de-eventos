# Gerenciador de Eventos PHP

Um sistema simples e funcional de Gerenciamento de Eventos desenvolvido em PHP Puro, seguindo o padrão de arquitetura MVC (Model-View-Controller) com um Front Controller para roteamento de URLs amigáveis.

## 🚀 Tecnologias Utilizadas

*   **PHP 8.2+**: Linguagem de programação do lado do servidor.
*   **MySQL**: Banco de dados relacional para armazenamento de usuários e eventos.
*   **PDO (PHP Data Objects)**: Para conexão segura com o banco de dados e prevenção de SQL Injection.
*   **CSS3**: Estilização da interface de usuário em arquivo externo.
*   **Apache (.htaccess)**: Para reescrita de URLs e roteamento.

## 🛠️ Como Configurar

1.  **Requisitos**: Ter o XAMPP, WAMP ou um ambiente PHP/MySQL instalado.
2.  **Banco de Dados**:
    *   Acesse o phpMyAdmin (`http://localhost/phpmyadmin`).
    *   Importe o arquivo `database.sql` localizado na raiz do projeto.
    *   O script criará o banco `sistema_eventos` e as tabelas necessárias.
3.  **Conexão**:
    *   Se necessário, ajuste as credenciais de acesso ao banco em `App/Core/Database.php`.
4.  **Servidor**:
    *   Certifique-se de que o módulo `mod_rewrite` do Apache esteja ativado.
    *   Acesse o projeto via `http://localhost/`.

## 📖 Funcionalidades e Fluxo

### 1. Autenticação de Usuários
*   **Cadastro (`/register`)**: Permite que novos usuários criem uma conta informando nome, e-mail e senha. As senhas são criptografadas.
![Registro](https://i.imgur.com/xnfcjtD.png)
*   **Login (`/login`)**: Verifica as credenciais no banco de dados e inicia uma sessão PHP.
![Login](https://i.imgur.com/wOn08hl.png)
*   **Logout (`/logout`)**: Encerra a sessão ativa e redireciona para a tela de login.

### 2. Dashboard de Eventos (`/dashboard`)
![Dashboard](https://i.imgur.com/sauAe63.png)
O dashboard agora é dividido em duas seções principais:
*   **Meus Eventos**: Lista exclusiva dos eventos criados pelo usuário logado, com permissões completas de edição e exclusão.
*   **Todos os Eventos**: Uma lista global que exibe todos os eventos cadastrados no sistema por qualquer usuário, incluindo o nome do organizador.

### 3. Gestão de Eventos (CRUD)
![Criação de eventos](https://i.imgur.com/f1ujlt2.png)
*   **Criar Evento (`/events/create`)**: Formulário para inserção de título, descrição e data/hora, associando o evento ao usuário logado.
*   **Editar Evento (`/events/edit/{id}`)**: Permite modificar eventos de propriedade do usuário. O sistema valida a propriedade antes de processar a alteração.
*   **Excluir Evento (`/events/delete/{id}`)**: Remove eventos de propriedade do usuário após confirmação.

## 📂 Estrutura de Pastas

*   `App/Controllers/`: Lógica de controle, navegação e processamento de requisições.
*   `App/Core/`: Classes fundamentais, como a conexão Singleton com o banco de dados.
*   `App/Models/`: Camada de persistência de dados (DAOs) para Usuários e Eventos.
*   `App/Views/`: Templates PHP/HTML que compõem a interface.
*   `public/css/`: Arquivos de estilização CSS.
*   `index.php`: Ponto de entrada (Front Controller) do sistema.
*   `.htaccess`: Configurações de reescrita de URL para o Apache.
