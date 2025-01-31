#!/bin/sh

# Ajusta as permissões do diretório database
echo "Ajustando permissões de /app/app/database..."
chown -R nobody:nobody /app/app/database
chmod -R 750 /app/app/database

# Passa o controle para o comando principal definido pelo Nixpacks
exec "$@"