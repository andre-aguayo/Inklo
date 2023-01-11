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

init:
	make create-env
	make install
	make key-generate
	make watch

test: 
	./vendor/bin/sail test