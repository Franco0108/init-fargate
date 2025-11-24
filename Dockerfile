# Dockerfile
FROM php:8.2-cli

WORKDIR /var/www/html

# Copiamos la app PHP
COPY src/ /var/www/html/

# Exponemos el puerto 8080
EXPOSE 8080

# Servidor PHP embebido escuchando en 0.0.0.0:8080
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]
