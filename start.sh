#!/bin/bash

# Define o "dono" dos arquivos para o usuário atual (complementa o UID/GID)
echo "Ajustando permissões..."
sudo chown -R $USER:$USER .

# 1. Copia .env se não existir
if [ ! -f .env ]; then
  echo "Criando arquivo .env a partir do .env.example..."
  cp .env.example .env
fi

# 2. Sobe os containers em background (-d)
echo "Subindo containers (pode demorar na primeira vez)..."
docker compose up --build -d

# 3. Gera a APP_KEY do Laravel
echo "Gerando APP_KEY do Laravel..."
docker compose exec app php artisan key:generate

# 4. Roda as migrations e seeds
echo "Rodando migrations e seeds..."
docker compose exec app php artisan migrate --seed

echo ""
echo "------------------------------------------------"
echo "🚀 PROJETO PRONTO! 🚀"
echo "Acesse em: http://localhost:8080"
echo ""
echo "Para ver os logs, rode: docker compose logs -f"
echo "Para parar, rode:     docker compose down"
echo "------------------------------------------------"