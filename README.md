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




## Back-End (Laravel)

O back-end da aplicação foi desenvolvido com o Laravel. Siga os passos abaixo para configurá-lo e rodá-lo no ambiente local:

### 1. Instalar Dependências

Certifique-se de que você tem o PHP e o Composer instalados em sua máquina. Depois, navegue até o diretório do back-end e instale as dependências:

```bash
cd backend
composer install
npm install
```
### 2. Rodar as migrations
Execute as migrations para configurar as tabelas do banco de dados:
```bash
php artisan migrate
```
### 3. Subir a API
Inicie o servidor de desenvolvimento com o comando:

```bash
php artisan serve
```

### A API estará disponível, por padrão, em http://localhost:8000.







