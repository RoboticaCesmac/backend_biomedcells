#!/bin/sh

# Ajusta as permissões do diretório database
echo "Iniciando o script de inicialização..."

# Verifica se o grupo 'nobody' existe, caso contrário, cria o grupo
echo "Criando o grupo nobody se não existir"
if ! grep -q '^nobody:' /etc/group; then
  addgroup nobody
fi

# Ajusta as permissões para o diretório /app/app/database
echo "Ajustando permissões de /app/app/database..."
chown -R nobody:nobody /app/app/database
chmod -R 750 /app/app/database

# Verifica as permissões após ajuste
echo "Verificando permissões de /app/app/database..."
ls -ld /app/app/database >> /app/start.log
ls -l /app/app/database >> /app/start.log

php-fpm