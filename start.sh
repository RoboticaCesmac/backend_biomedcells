# Ajusta as permissões do diretório database
echo "Verificando se /app/app/database existe..."
if [ -d "/app/app/database" ]; then
    echo "Ajustando permissões de /app/app/database..."
    chown -R nobody:nobody /app/app/database
    chmod -R 750 /app/app/database
else
    echo "/app/app/database não encontrado."
fi