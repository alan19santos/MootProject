# Projeto: Filtro de Produtos com Laravel, Livewire e Docker

Este projeto é um exemplo de aplicação Laravel para implementar filtros combinados de produtos por **nome**, **categoria** e **marca**, com suporte a seleção múltipla e persistência de parâmetros. Utilizando Livewire e com ambiente containerizado com Docker.

---

## 🚀 Tecnologias

- Laravel 10+
- Livewire
- Docker + Docker Compose
- MySQL
- PHP 8.x
- Composer
- PHPUnit

---
## ⚙️ Como rodar o projeto

### 1. Clone o repositório


```bash
git clone (https://github.com/alan19santos/MootProject.git)
cd MootProject

### Cope o arquivo env
cp .env.example .env

### Suba os containers
docker-compose up -d --build
- Isso irá iniciar os containers do laravel, banco de dados e serviços necessários

### Acesse o container
docker exec -it Moot_app bash

### Instale as dependencias
composer install

### Grave a chave
php artisan key:generate

### Execute as migrations, seeders e factories
php artisan migrate --seed

### Acesse a aplicação
http://localhost:8000

## 🧪 Testes
Rodar no container
- php artisan test
- Os testes cobrem os filtros combinados por nome, categoria e marca e verificação de rest de filtros, um dos testes vai falhar, mas é proposital.

# 👨‍💻 Autor
Desenvolvido por Alan dos Santos


