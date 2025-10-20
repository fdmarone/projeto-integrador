# 🚀 Projeto Laravel com Docker

Este projeto é uma aplicação Laravel containerizada com Docker, incluindo: PHP 8.2 (FPM), MySQL 8, Node.js 18 (com Vite), Nginx, hot reload com Vite, e suporte a UID/GID para evitar problemas de permissão.

## ⚙️ Requisitos

- Docker  
- Docker Compose  
- WSL 2 (recomendado no Windows)

⚠️ Se estiver no Windows, evite usar diretórios como `/mnt/c/...`. Prefira caminhos dentro do Linux (`/home/usuario/...`).

## 🚀 Instalação do Projeto

1. Clone o repositório:  
   `git clone https://github.com/fdmarone/projeto-integrador.git && cd laravel-app`

2. Copie o arquivo `.env`:  
   `cp .env.example .env`

3. Verifique se o `.env` contém as variáveis UID e GID. Você pode descobrir os valores com os comandos `id -u` e `id -g`. Por exemplo:  
   ```
   UID=1000  
   GID=1000
   ```

4. Suba os containers:  
   `docker compose up --build`  

   Este comando irá:
   - Construir a imagem do app
   - Instalar dependências do Laravel e do Node.js
   - Iniciar os containers `app`, `web`, `mysql` e `npm`

5. Após os containers estarem ativos, execute as migrations e seeds:  
   `docker exec -it laravel-app php artisan migrate --seed`

6. Acesse o sistema:
   - Frontend: http://localhost:8080

## 🛠️ Comandos úteis

- Acessar o container Laravel: `docker exec -it laravel-app bash`  


## 🧼 Reset do ambiente

Se quiser limpar e reconstruir tudo do zero:

```
docker compose down -v --remove-orphans  
docker volume prune -f  
docker compose up --build
```

## 🔐 Permissões

Este projeto evita problemas de permissão de arquivos usando UID e GID do host no container.

Se mesmo assim tiver problemas, você pode corrigir manualmente com:

```
sudo chown -R $USER:www-data storage bootstrap/cache  
sudo chmod -R 775 storage bootstrap/cache
```

<!-- TLDR: -->

Projeto Laravel com Docker
Requisitos
⦁	Docker
⦁	Docker Compose
⦁	WSL 2 (para Windows)
Passos para rodar o projeto
1.	Clone o projeto:
git clone https://github.com/seu-usuario/seu-projeto.git && cd seu-projeto
2.	Copie o arquivo .env:
cp .env.example .env
3.	Confirme UID e GID no terminal:
id -u  # ex: 1000
id -g  # ex: 1000
4.	Atualize o .env com os valores de UID e GID.
5.	Suba os containers:
docker compose up --build
6.	Rode as migrations e seeds:
docker exec -it laravel-app php artisan migrate --seed
7.	Acesse a aplicação:
http://localhost:8080