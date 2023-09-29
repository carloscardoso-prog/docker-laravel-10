#!/bin/bash

# 1. Parar o Docker
systemctl stop docker

# 2. Remover o arquivo de configuração do Docker
rm ~/.docker/config.json

# 3. Iniciar o Docker
systemctl start docker

# 4. Fazer login no Docker
docker login

# 5. Listar os contextos do Docker
docker context ls

# 6. Usar o contexto "desktop-linux" (substitua pelo nome do seu contexto)
docker context use desktop-linux

# 7. Executar o docker-compose (com build) em segundo plano (-d)
docker-compose up -d --build
