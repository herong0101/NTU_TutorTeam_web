FROM wordpress:php8.2-apache

# Copy custom theme
COPY ./wp-content /var/www/html/wp-content

# Set permissions
RUN chown -R www-data:www-data /var/www/html/wp-content

# Expose port
EXPOSE 80
