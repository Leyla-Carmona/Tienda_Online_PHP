FROM php:8.2-apache
WORKDIR /var/www/html
COPY . .
EXPOSE 80
CMD ["apache2-foreground"]
