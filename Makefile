DC := docker compose
FPM := $(DC) exec fpm
ARTISAN := $(FPM) php artisan

env:
	cp .env.example .env

build:
	@$(DC) build

start-logs:
	@$(DC) up

start:
	@$(DC) up -d

stop:
	@$(DC) stop

down:
	@$(DC) down

npm-install:
	@$(FPM) npm install

npm-build:
	@$(FPM) npm run build && npm run build --ssr

npm-watch:
	@$(FPM) npm run build && npm run build --ssr --watch

ssh:
	@$(FPM) /bin/bash

composer-install:
	@$(FPM) composer install

migrate:
	@$(ARTISAN) migrate

seed:
	@$(ARTISAN) db:seed

seed-images:
	cp -r database/seeders/images/. storage/app/public/images

storage-link:
	@$(ARTISAN) storage:link

key-generate:
	@$(ARTISAN) key:generate

start-expanded: start migrate seed

setup: env build start composer-install
