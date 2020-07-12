# Laravel docker skeleton

## Deploy
1) make setup
2) Set in .env file: DB_PASSWORD, USER_ADMIN_PASSWORD, CUSTOMER_DEFAULT_PASSWORD
3) docker-compose build
4) docker-compose up

## Clear all and start application from scratch

This step is needed if you start application before.

Remove all containers:
```bash

docker system prune -a
sudo make clear

```

Than configurate application.

## Configurate application
If you want to import dump of database, please locate it in `.docker/config/postgresql/dump` directory. `.docker/data/postgresql` have to be empty.

```bash

make setup

```

Build containers:

```bash

# development
make build

```

## Start application
```bash

# development
make up

```

## Stop application
```bash

# development
make down

```

## Clear all containers data
```bash

make clear

```

## Clear artisan cache

```bash

clear-cache

```


### Example run artisan commands
```bash
# Clear cache
docker-compose exec php php artisan cache:clear
docker-compose exec php php artisan config:cache
docker-compose exec php php artisan view:clear

# Migrate + seed
docker-compose exec php php artisan migrate --seed
docker-compose exec php php artisan migrate:rollback --step=1

# Add new migration
docker-compose exec php php artisan make:migration create_name_table
docker-compose exec php php artisan make:model Models/NameDir/NameModel

# Generate Tests
docker-compose exec php php vendor/bin/codecept generate:cest api  NameDirectory/NameTestCets
docker-compose exec php php vendor/bin/codecept generate:test unit NameDirectory/NameTestTest

# Example run Test
docker-compose exec php php vendor/bin/codecept run -- tests/api/User/nameCest.php

# Disable caching
in .env file set CACHE_DRIVER=none; after # Clear cache (look higher) and make down/up containers.

## Example skip test
# public function saveQuiz(ApiTester $I, $scenario)
# {
#    $scenario->incomplete('testing skipping');
```