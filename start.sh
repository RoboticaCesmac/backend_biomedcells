#!/bin/sh

# Ajusta as permissões do diretório database
echo "Ajustando permissões de /app/app/database..."

# Verifica se o grupo 'nobody' existe, caso contrário, cria o grupo
if ! grep -q '^nobody:' /etc/group; then
  addgroup nobody
fi

# Ajusta as permissões para o diretório /app/app/database
chown -R nobody:nobody /app/app/database
chmod -R 750 /app/app/database