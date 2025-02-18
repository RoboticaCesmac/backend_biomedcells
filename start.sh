#!/bin/sh

# Log de inicialização
echo "Iniciando o script de inicialização..." > /app/start.log

# Verifica se o grupo 'nobody' existe, caso contrário, cria o grupo
echo "Criando o grupo nobody se não existir" >> /app/start.log
if ! grep -q '^nobody:' /etc/group; then
  echo "Grupo 'nobody' não encontrado. Criando..." >> /app/start.log
  addgroup nobody >> /app/start.log 2>&1
else
  echo "Grupo 'nobody' já existe." >> /app/start.log
fi

# Ajusta as permissões para o diretório /app/app/database
echo "Ajustando permissões de /app/app/database..." >> /app/start.log
chown -R nobody:nobody /app/app/database >> /app/start.log 2>&1
chmod -R 750 /app/app/database >> /app/start.log 2>&1

# Verifica as permissões após ajuste
echo "Verificando permissões de /app/app/database..." >> /app/start.log
ls -ld /app/app/database >> /app/start.log
ls -l /app/app/database >> /app/start.log