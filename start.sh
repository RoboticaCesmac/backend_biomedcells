#!/bin/sh

# Ajusta as permissões do diretório database
echo "Ajustando permissões de /app/app/database..."
chown -R nobody:nobody /app/app/database
chmod -R 750 /app/app/database
chown -R nobody:nobody /app/database
chmod -R 750 /app/database
chown -R nobody:nobody /app/app/app/database
chmod -R 750 /app/app/app/database