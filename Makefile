create-env:
	cp ./.env.example ./.env

key-generate:
	php artisan key:generate

install:	
	composer install 
	yarn install

up: 
	./vendor/bin/sail up -d

watch:
	yarn dev

front-build:
	yarn build

init:
	make create-env
	make install
	make key-generate
	make front-build
	make up

test: 
	./vendor/bin/sail test
