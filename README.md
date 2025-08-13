# Laravel To-Do App

Um sistema web simples e funcional para gerenciamento pessoal de tarefas.  
Desenvolvido com **Laravel 11**, utilizando autenticação com **Laravel Breeze** e interface responsiva com **Tailwind CSS**.

## 📌 Funcionalidades
- Cadastro e autenticação de usuários.
- Criar, listar, editar e excluir tarefas.
- Marcar/desmarcar tarefas como concluídas.
- Filtro por status (Pendentes / Concluídas).
- Busca de tarefas pelo título.
- Interface responsiva.

## 🛠 Tecnologias utilizadas
- [Laravel 12](https://laravel.com/)
- [Laravel Breeze](https://laravel.com/docs/master/starter-kits#laravel-breeze)
- [Blade](https://laravel.com/docs/master/blade)
- [Tailwind CSS](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)

## 🚀 Como executar o projeto

### 1️⃣ Clonar o repositório
```bash
git clone https://github.com/lucasFreitasDev97/task-manager-laravel.git

2️⃣ Instalar dependências
composer install
npm install
npm run build

3️⃣ Configurar o .env
cp .env.example .env

4️⃣ Gerar chave da aplicação
php artisan key:generate

5️⃣ Rodar migrations
php artisan migrate

6️⃣ Iniciar servidor
php artisan serve

Acesse em: http://127.0.0.1:8000
