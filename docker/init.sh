#!/bin/bash

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${GREEN}Starting container setup...${NC}"

# Create necessary Yii2 directories if they don't exist
echo -e "${YELLOW}Creating Yii2 directories...${NC}"
mkdir -p /app/runtime/cache
mkdir -p /app/runtime/logs
mkdir -p /app/public/assets

# Configure permissions for Yii2 directories
echo -e "${YELLOW}Setting up permissions...${NC}"

# Try to set permissions and ownership - handle both mounted volumes and container-only scenarios
if chown -R www-data:www-data /app/runtime 2>/dev/null; then
    chmod -R 775 /app/runtime
    echo -e "${GREEN}✓ Runtime directory configured correctly${NC}"
else
    # If chown fails (mounted volume), try chmod only
    if chmod -R 777 /app/runtime 2>/dev/null; then
        echo -e "${YELLOW}⚠ Runtime directory permissions set to 777 (mounted volume)${NC}"
    else
        echo -e "${RED}✗ Error: Could not configure runtime directory${NC}"
    fi
fi

if chown -R www-data:www-data /app/public/assets 2>/dev/null; then
    chmod -R 775 /app/public/assets
    echo -e "${GREEN}✓ Assets directory configured correctly${NC}"
else
    # If chown fails (mounted volume), try chmod only
    if chmod -R 777 /app/public/assets 2>/dev/null; then
        echo -e "${YELLOW}⚠ Assets directory permissions set to 777 (mounted volume)${NC}"
    else
        echo -e "${RED}✗ Error: Could not configure assets directory${NC}"
    fi
fi

echo -e "${GREEN}Setup completed.${NC}"

# Check if composer.json exists and vendor directory doesn't exist
if [ -f "/app/composer.json" ] && [ ! -d "/app/vendor" ]; then
    echo -e "${YELLOW}Installing Composer dependencies...${NC}"

    # Set up composer environment variables for www-data user
    export HOME=/var/www
    export COMPOSER_HOME=/var/www/.composer
    export COMPOSER_CACHE_DIR=/var/www/.composer/cache

    # Create composer cache directory and set ownership
    echo -e "${YELLOW}Setting up composer cache...${NC}"
    mkdir -p /var/www/.composer/cache
    chown -R www-data:www-data /var/www/.composer

    # Make /app writable by www-data (critical for mounted volumes)
    echo -e "${YELLOW}Ensuring /app is writable...${NC}"
    chmod 777 /app

    # Install dependencies based on environment AS www-data user
    if [ "$YII_ENV" = "prod" ]; then
        # Production: exclude dev dependencies and optimize autoloader
        gosu www-data env HOME=/var/www COMPOSER_HOME=/var/www/.composer COMPOSER_CACHE_DIR=/var/www/.composer/cache \
            composer install --no-dev --optimize-autoloader --no-interaction
    else
        # Development: include dev dependencies
        gosu www-data env HOME=/var/www COMPOSER_HOME=/var/www/.composer COMPOSER_CACHE_DIR=/var/www/.composer/cache \
            composer install --optimize-autoloader --no-interaction
    fi

    echo -e "${GREEN}✓ Composer dependencies installed successfully.${NC}"
    echo -e "${GREEN}✓ Both vendor/ and node_modules/ should have correct permissions.${NC}"
fi

echo -e "${GREEN}Starting supervisord...${NC}"

# Start supervisord
exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf
