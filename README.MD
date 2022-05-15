# Biblioteca Laravel + Vue 2

## Sobre o projeto
Projeto criado em laravel e vue 2.
O projeto consiste em uma biblioteca na qual o úsuario pode adicionar um livro, marcar/visualizar qual/quais livros está lendo e após a leitura deixar um comentário. Possui autenticação laravel/passport, sendo todas as views feitas no Vue (inclusive as rotas de login).

## Como utilizar

### Passo a passo

Clone Repositório
```sh
git clone https://github.com/matheusvalbert/biblioteca.git biblioteca
```

```sh
cd biblioteca/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=biblioteca
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app /bin/bash
```


Instalar as dependências do projeto
```sh
composer install
npm i
```
Realizar as migrations
```
php artisan migrate
php artisan passport:install
npm run dev
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8080](http://localhost:8080)

Acesso ao phpmyadmin
[http://localhost:8081](http://localhost:8081)