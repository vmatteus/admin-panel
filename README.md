# Admin Panel - Laravel + Inertia.js + Vue 3 (com Docker)

Este projeto é um painel administrativo utilizando **Laravel 10**, **Inertia.js**, **Vue 3** e **Docker** para facilitar o setup e desenvolvimento.

---

## 🚀 Tecnologias

- Laravel 10
- Breeze (com Inertia.js + Vue 3)
- PHP 8.2 (via Docker)
- Nginx
- MySQL 8
- Node.js (dentro do container)
- Vite

---

## 🐳 Pré-requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- (Opcional) [Make](https://www.gnu.org/software/make/) instalado para atalhos

---

## 📦 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/admin-panel.git
cd admin-panel
```

### 2. Copie o arquivo `.env`

```bash
cp .env.example .env
```

### 3. Suba os containers

```bash
docker-compose up -d --build
```

### 4. Instale as dependências do PHP

```bash
docker exec -it admin-panel composer install
```

### 5. Instale as dependências do Node/Vite

```bash
docker exec -it admin-panel npm install
docker exec -it admin-panel npm run dev
```

### 6. Gere a chave da aplicação e rode as migrations

```bash
docker exec -it admin-panel php artisan key:generate
docker exec -it admin-panel php artisan migrate
```

### 7. Acesse no navegador

[http://localhost:8000](http://localhost:8000)

---

## 🧰 Comandos úteis

```bash
# Acessar o container
docker exec -it admin-panel bash

# Rodar comandos Artisan
docker exec -it admin-panel php artisan migrate

# Rodar o Vite (frontend)
docker exec -it admin-panel npm run dev
```

---

## 🗃 Banco de dados

- **Host:** `mysql`
- **Porta:** `3306`
- **Usuário:** `laravel`
- **Senha:** `laravel`
- **Database:** `laravel`

No `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

---

## ✅ Próximos passos

- Criar área administrativa com rotas protegidas (`/admin`)
- Adicionar controle de permissões (ex: Spatie Laravel Permission)
- Implementar dashboard e CRUDs

---

## 👨‍💻 Autor

Vinicius Matteus
