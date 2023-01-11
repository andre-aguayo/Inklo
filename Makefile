create-env:
	cp ./.env.example ./.env

key-generate:
	php artisan key:generate

install:	
	composer install 
	yarn install
	yarn build

up: 
	./vendor/bin/sail up -d

init:
	make create-env
	make install
	make key-generate
	make first-up

test: 
	./vendor/bin/sail test