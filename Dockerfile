# Cria o grupo 'nobody' se não existir
RUN if ! grep -q "^nobody:" /etc/group; then addgroup nobody; fi

# Ajusta as permissões do diretório 'database'
RUN chown -R nobody:nobody /app/app/database && \
    chmod -R 750 /app/app/database

# Comando de inicialização do aplicativo (substitua pelo comando correto)
CMD ["php-fpm"]

# Manualmente é isso que é feito:
# Verifica se o grupo nobody existe "cat /etc/group | grep nobody"
# Cria o grupo nobody se ele não existir "addgroup nobody"
# Altera o propietário do diretório database "sudo chown -R nobody:nobody /app/app/database"
# Aplica permissões mais restritas "chmod -R 750 /app/app/database"