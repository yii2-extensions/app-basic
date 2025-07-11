# Check if composer.json exists and vendor directory doesn't exist
if [ -f "/app/composer.json" ] && [ ! -d "/app/vendor" ]; then
    echo "Installing Composer dependencies..."

    # Install dependencies based on environment
    if [ "$YII_ENV" = "prod" ]; then
        # Production: exclude dev dependencies and optimize autoloader
        composer install --no-dev --optimize-autoloader --no-interaction
    else
        # Development: include dev dependencies
        composer install --optimize-autoloader --no-interaction
    fi

    # Set proper ownership for vendor directory
    chown -R $USER_NAME:$GROUP_NAME /app/vendor

    echo "Composer dependencies installed successfully."
fi

# Start supervisord
exec supervisord -c /etc/supervisor/supervisord.conf
