# Installation guide

## System requirements

- [`PHP`](https://www.php.net/downloads) 8.1 or higher.
- [`Composer`](https://getcomposer.org/download/) for dependency management.
- [`Yii2`](https://github.com/yiisoft/yii2) 2.0.53+ or 22.x.
- Web server (Apache, Nginx, or built-in PHP server).

### Optional requirements

- **Node.js**: For advanced asset compilation (optional)
- **Docker**: For containerized development

## Installation methods

### Method 1: Using composer (recommended)

Create a new project using the Yii App Basic template.

```bash
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic myapp
cd myapp
```

### Method 2: Manual installation

1. **Download the template**:
```bash
git clone https://github.com/yii2-extensions/app-basic.git myapp
cd myapp
```

2. **Install dependencies**
```bash
composer install
```

### Method 3: Using git

Clone the repository and set up your project.

```bash
git clone https://github.com/yii2-extensions/app-basic.git myapp
cd myapp
rm -rf .git
git init
composer install
```

## Post-installation setup

### Directory permissions

Ensure the following directories are writable by the web server.

```bash
chmod 775 public/assets runtime tests/_output
```

### Environment configuration

1. **Create environment file** (optional)
```bash
cp .env.example .env
```

2. **Configure database connection** in `config/web/components.php`
```php
<?php

return [
    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=myapp',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ],
];
```

### Web server configuration

#### Apache

Create `public/.htaccess`.

```apache
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```

#### Nginx

Add to your Nginx configuration.

```nginx
server {
    listen 80;
    server_name myapp.local;
    root /path/to/myapp/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
```

#### Built-in PHP server

For development purposes.

```bash
# Method 1: Using PHP built-in server
php -S localhost:8080 -t public

# Method 2: Using Yii console command
./yii serve

# Method 3: Custom host and port
./yii serve --host=0.0.0.0 --port=8080
```

## Development setup

### Database setup

1. **Create database**
```sql
CREATE DATABASE myapp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. **Run migrations** (if available)
```bash
./yii migrate
```

3. **Seed test data** (optional)
```bash
./yii fixture/load
```

### Asset compilation

For advanced asset management.

```bash
# Install Node.js dependencies
npm install

# Compile assets
npm run build

# Watch for changes during development
npm run watch
```

## Docker setup

### Using docker compose

Create `docker-compose.yml`.

```yaml
version: '3.8'

services:
  web:
    image: yiisoftware/yii2-php:8.1-apache
    ports:
      - "8080:80"
    volumes:
      - .:/app
    depends_on:
      - db
    environment:
      - DB_HOST=db
      - DB_NAME=myapp
      - DB_USER=root
      - DB_PASSWORD=secret

  db:
    image: mysql:8.0
    environment:
      - MYSQL_ROOT_PASSWORD=secret
      - MYSQL_DATABASE=myapp
    volumes:
      - mysql_data:/var/lib/mysql

volumes:
  mysql_data:
```

Run the application.

```bash
docker-compose up -d
```

### Using Docker directly

```bash
# Build custom image
docker build -t myapp .

# Run container
docker run -p 8080:80 myapp
```

### Performance optimization

#### Enable OPcache

Add to your `php.ini`.

```ini
opcache.enable=1
opcache.enable_cli=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=60
opcache.fast_shutdown=1
```

#### Configure caching

Enable cache components in `config/web/components.php`.

```php
'cache' => [
    'class' => 'yii\caching\FileCache',
],
'urlManager' => [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'rules' => [
        // Your URL rules
    ],
],
```

## Next steps

Once the installation is complete.

- ⚙️ [Configuration Reference](configuration.md)
- 💡 [Usage Examples](examples.md)
- 🧪 [Testing Guide](testing.md)
