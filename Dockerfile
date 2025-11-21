FROM php:8.2-apache

# Habilitar módulos necesarios
RUN a2enmod rewrite

# Cambiar Apache a puerto 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:8080>/' /etc/apache2/sites-available/000-default.conf

# Copiar código
COPY src/ /var/www/html/

# Puerto para ECS Fargate
EXPOSE 8080

CMD ["apache2-foreground"]
