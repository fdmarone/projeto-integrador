# 🚀 Projeto Laravel com Docker

Este projeto é uma aplicação Laravel containerizada com Docker, incluindo: PHP 8.2 (FPM), MySQL 8, Node.js 18 (com Vite), Nginx, hot reload com Vite, e suporte a UID/GID para evitar problemas de permissão.

## ⚙️ Requisitos

- Docker  
- Docker Compose  
- WSL 2 (recomendado no Windows)

⚠️ Se estiver no Windows, evite usar diretórios como `/mnt/c/...`. Prefira caminhos dentro do Linux (`/home/usuario/...`).

## 🚀 Instalação do Projeto

1. **Clone o repositório:**  
   ```bash
   git clone https://github.com/fdmarone/projeto-integrador.git
   cd projeto-integrador
   ```

2. **Dê permissão de execução ao script (apenas na primeira vez):**  
   ```bash
   chmod +x start.sh
   ```

3. **Inicie todo o ambiente com um único comando:**  
   ```bash
   ./start.sh
   ```

   Esse script irá:
   - Criar e configurar o arquivo `.env` (se necessário);
   - Construir e iniciar todos os containers (`app`, `web`, `mysql`, etc.);
   - Instalar as dependências do Laravel e do Node.js;
   - Executar as migrations e seeds;
   - Deixar o sistema pronto para uso.

4. **Acesse a aplicação:**  
   - **Frontend:** http://localhost:8080  
   - **API / Backend (Laravel):** http://localhost:8000  

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

## 📽️ Vídeo apresentando o projeto
[![Thumbnail do vídeo de apresentação com a página inicial do projeto](/documentation/VideoProjetoIntegradorThumb.png)](https://youtu.be/5Rro_7UALd4?si=t3ymdnBrroDoehBu)

## ☁️ Implementação na AWS — Proposta básica

![Imagem descrevendo como uma arquitetura de um workload pode se beneficiar com o produto AWS Fargate](/documentation/fargatediagram.png)

Esta seção descreve uma proposta prática e mínima para implantar este projeto na AWS usando AWS Fargate (ECS) para execução dos containers. A proposta assume que você quer manter a aplicação em containers (como hoje com Docker) e migrar o runtime para a nuvem, usando serviços gerenciados sempre que possível.

Resumo da arquitetura
- Repositório de imagens: Amazon ECR
- Execução de containers: Amazon ECS (Fargate)
- Balanceamento / TLS / DNS: Application Load Balancer (ALB) + ACM (TLS) + Route 53 (DNS)
- Banco de dados: Amazon RDS (preferível Aurora MySQL ou RDS MySQL) com snapshots e Multi-AZ para produção
- Pool de conexões: RDS Proxy (recomendado) para reduzir problemas de excesso de conexões
- Cache / Sessões: Amazon ElastiCache (Redis) — recomendado para produção
- Storage de arquivos (uploads/public): Amazon S3 (configurar Laravel filesystem -> s3)
- CI/CD: GitHub Actions (usar OIDC para assumir role AWS) — build, push para ECR e deploy ECS
- Logs/Monitoramento: CloudWatch Logs (para Fargate) e CloudWatch Alarms
- Segredos: AWS Secrets Manager (DB password, APP_KEY, etc.)
- Filas: Amazon SQS (driver sqs do Laravel). Workers long-running: Fargate (Horizon/queue:work)
Vantagens do Fargate (conforme a imagem de referência)
- Não precisa provisionar EC2; define apenas CPU/memory por task
- Paga-se pelo compute solicitado quando o container está em execução
- Isolamento por aplicação por design
- Boa compatibilidade com workloads Laravel (arquivos locais, Horizon, queue:work)

  ## 👷Integrantes do grupo
* [@fdmarone](https://github.com/fdmarone) / Flora dos Anjos Marone
* [@eprahoje](https://github.com/eprahoje) / Gabriel Rodrigues Caetano da Silva
* [@Pedrodev17](https://github.com/Pedrodev17) / Pedro Henrique Marins da Silva
* [@tamiressena](https://github.com/tamiressena) / Tamires Sena Afonso
* [@Levinni](https://github.com/Levinni) / Vinícius Rodrigues Leite
