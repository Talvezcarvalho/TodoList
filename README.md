# Meu Projeto TodoList

Este projeto é uma aplicação de **Lista de Tarefas** com uma API feita **em Laravel** e **Front-End em Vue.js** utilizando o Quasar Framework. A aplicação permite criar, editar, excluir e concluir tarefas.

## Front-End

Abaixo está a estrutura do projeto-front:

```bash
TODOLIST
├── .vscode
├── node_modules
├── public
├── src
│   ├── assets
│   │   └── main.css
│   ├── components
│   │   ├── icons
│   │   │   ├── checkedIcon.vue
│   │   │   ├── deleteIcon.vue
│   │   │   ├── editIcon.vue
│   │   │   └── completedTaskList.vue
│   │   ├── mainLayout.vue
│   │   ├── navBar.vue
│   │   ├── taskInsert.vue
│   │   ├── taskItem.vue
│   │   └── taskList.vue
│   ├── http
│   └── App.vue
│   ├── main.js
│   ├── quasar-variables.sass
├── .gitignore
├── index.html
├── package.json
├── .editorconfig
├── .prettierrc.json
├── eslint.config.js
├── package-lock.json
├── README.md
├── vite.config.js
└── jsconfig.json
```
### 1. Instalar Dependências
É necessário ter instalado em sua maquina NodeJs, caso já esteja instalado execute dentro diretório do front:
```bash
npm install
```

### 1.2. Iniciar servidor local
Basta apenas executar o comando:
```bash
npm run dev
```
e a aplicação estará disponivel para ser acessada em http://localhost:5173/


## Back-End (Laravel)

O back-end da aplicação foi desenvolvido com o Laravel. Siga os passos abaixo para configurá-lo e rodá-lo no ambiente local:

### 2.1. Instalar Dependências

Certifique-se de que você tem o PHP e o Composer instalados em sua máquina. Depois, navegue até o diretório do back-end e instale as dependências:

```bash
cd backend
composer install
npm install
```

### 2.2 Configure variaveis de ambiente
Para configurar as variáveis de ambiente e o banco de dados, siga os passos abaixo:

**Editar o arquivo `.env`**  
   Abra o arquivo `.env` na raiz do projeto e atualize as seguintes linhas com as informações do seu banco de dados:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
```
altere para:
```env
DB_CONNECTION=pgsql
```
**Editar o arquivo `.config/database`**  
   Abra o arquivo `.database` em config e atualize as seguintes linhas com as informações do seu banco de dados:
   ```database
   'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'NOMEDOSEUBANCO'),
            'username' => env('DB_USERNAME', 'NOMEDEUSUARIO'),
            'password' => env('DB_PASSWORD', 'SENHADOBANCO'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],
```
E altere a variavel DB_CONNECTION
 ```database
    'default' => env('DB_CONNECTION', 'pgsql'),
```


### 2.3 Rodar as migrations
Execute as migrations para configurar as tabelas do banco de dados:
```bash
php artisan migrate
```

### 2.4. Subir a API
Inicie o servidor de desenvolvimento com o comando:

```bash
php artisan serve
```

### A API estará disponível, por padrão, em http://localhost:8000.

> **Observação:** Caso queira injetar valores para testar, basta usar o Factory








