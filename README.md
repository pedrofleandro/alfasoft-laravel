# Documentação do Projeto Laravel

Este projeto implementa uma aplicação de contatos utilizando o Laravel. A aplicação permite criar, editar, visualizar e excluir contatos, com funcionalidades de autenticação para acesso às rotas de criação, edição e exclusão.

## Informações de Autenticação

Para acessar as rotas de criação, edição e exclusão de contatos, é necessário estar autenticado. Um usuário de exemplo foi criado na base de dados da Alfasoft para facilitar o processo de login:

- **Email**: pedrofragosoleandro@gmail.com
- **Senha**: 123

## Rotas da Aplicação

A seguir estão as rotas disponíveis na aplicação:

### 1. **Página Inicial (Listagem de Contatos)**
- **Método**: `GET`
- **Rota**: `/`
- **Controlador**: `ContactController@index`
- **Descrição**: Exibe uma lista de todos os contatos cadastrados.

### 2. **Página de Criação de Contato**
- **Método**: `GET`
- **Rota**: `/contacts/create`
- **Controlador**: `ContactController@create`
- **Descrição**: Exibe o formulário para criar um novo contato. **Requer autenticação**.

- **Método**: `POST`
- **Rota**: `/contacts`
- **Controlador**: `ContactController@store`
- **Descrição**: Processa a criação de um novo contato. **Requer autenticação**.

### 3. **Página de Edição de Contato**
- **Método**: `GET`
- **Rota**: `/contacts/{id}/edit`
- **Controlador**: `ContactController@edit`
- **Descrição**: Exibe o formulário para editar um contato existente. **Requer autenticação**.

- **Método**: `PUT`
- **Rota**: `/contacts/{id}`
- **Controlador**: `ContactController@update`
- **Descrição**: Processa a atualização de um contato existente. **Requer autenticação**.

### 4. **Página de Detalhes do Contato**
- **Método**: `GET`
- **Rota**: `/contacts/{id}`
- **Controlador**: `ContactController@show`
- **Descrição**: Exibe os detalhes de um contato específico.

### 5. **Excluir Contato**
- **Método**: `DELETE`
- **Rota**: `/contacts/{id}`
- **Controlador**: `ContactController@destroy`
- **Descrição**: Exclui um contato da lista. **Requer autenticação**.

### 6. **Página de Login**
- **Método**: `GET`
- **Rota**: `/login`
- **Controlador**: `AuthenticatedSessionController@create`
- **Descrição**: Exibe o formulário de login.

- **Método**: `POST`
- **Rota**: `/login`
- **Controlador**: `AuthenticatedSessionController@store`
- **Descrição**: Processa o login do usuário.

### 7. **Logout**
- **Método**: `POST`
- **Rota**: `/logout`
- **Controlador**: `AuthenticatedSessionController@destroy`
- **Descrição**: Realiza o logout do usuário autenticado.

## Como Rodar o Projeto

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/username/repository-name.git
   cd repository-name

2. **Instale as dependências**:
  ```bash
  composer install
3. **Configure o arquivo .env**:
  - **Configure as variáveis de ambiente para conexão com o banco de dados.**
3. **Gere as chaves de aplicação:**:
  ```bash
  php artisan key:generate
5. **Rodar as migrações**:
  ```bash
  php artisan migrate
6. **Inicie o servidor de desenvolvimento**
  ```bash
  php artisan serve