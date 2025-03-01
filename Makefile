init: docker-down \
	docker-pull docker-build yarn-install docker-up \
	app-composer-install
up: docker-up
down: docker-down
restart: down up
rebuild: down docker-build-no-pull docker-up

docker-up:
	cd project && docker compose up -d

docker-down:
	cd project && docker compose down --remove-orphans

docker-pull:
	cd project && docker compose pull

docker-build:
	cd project && docker compose build --pull

docker-build-no-pull:
	docker compose build

cli:
	cd project && docker compose run --rm php-cli bash

app-composer-install:
	cd project && docker compose run --rm php-cli composer install

app-migrations:
	cd project && docker compose run --rm php-cli bin/console d:m:m --no-interaction

yarn-install:
	cd project && docker-compose run --rm node-cli yarn install
