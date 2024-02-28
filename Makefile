DC := docker compose
FPM := $(DC) exec fpm
NODE := $(DC) exec node
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

node:
	@$(NODE) /bin/bash

npm-install:
	@$(NODE) npm install

npm-build:
	@$(NODE) npm run build

npm-watch:
	@$(NODE) npm run watch

ssh:
	@$(FPM) /bin/bash

composer-install:
	@$(FPM) composer install

migrate:
	@$(ARTISAN) migrate

seed:
	@$(ARTISAN) db:seed

key-generate:
	@$(ARTISAN) key:generate

start-expanded: start migrate seed

setup: env build start composer-install
