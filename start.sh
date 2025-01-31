#!/bin/sh

# Ajusta as permissões do diretório database
echo "Ajustando permissões de /app/app/database..."
ls -l
chown -R nobody:nobody /app/app/database
chmod -R 750 /app/app/database