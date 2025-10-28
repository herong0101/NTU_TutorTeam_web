FROM wordpress:php8.2-apache

# Copy custom theme
COPY ./wp-content /var/www/html/wp-content

# Set permissions
RUN chown -R www-data:www-data /var/www/html/wp-content

# Configure Apache to listen on port 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Expose port
EXPOSE 8080
