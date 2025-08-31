# Installation guide

## System requirements

- [`PHP`](https://www.php.net/downloads) 8.1 or higher.
- [`Composer`](https://getcomposer.org/download/) for dependency management.
- [`npm`](https://nodejs.org/en/download/) for frontend dependency management.
- [`Yii2`](https://github.com/yiisoft/yii2) 2.0.53+ or 22.x.

### Optional requirements

- **Node.js**: For advanced asset compilation (optional)

## Installation methods

### Method 1: Using composer (recommended)

Create a new project using the Yii App Basic template.

```bash
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic app-basic
cd app-basic
```

### Method 2: Manual installation

1. **Download the template**:
```bash
git clone https://github.com/yii2-extensions/app-basic.git app-basic
cd app-basic
```

2. **Install dependencies**
```bash
composer install
```

### Method 3: Using git

Clone the repository and set up your project.

```bash
git clone https://github.com/yii2-extensions/app-basic.git app-basic
cd app-basic
rm -rf .git
git init
composer install
```

## Post-installation setup

### Directory permissions

Ensure the following directories are writable by the web server.

```bash
chmod 775 web/assets runtime tests/_output
```

#### Built-in PHP server

For development purposes.

```bash
# Method 1: Using PHP built-in server
php -S localhost:8080 -t web

# Method 2: Using Yii console command
./yii serve

# Method 3: Custom host and port
./yii serve --host=0.0.0.0 --port=8080
```

## Development setup

### Database setup

1. **Create database**
```sql
CREATE DATABASE app_basic CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
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
- 🧪 [Testing Guide](testing.md)
