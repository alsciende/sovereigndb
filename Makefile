php = docker-compose -f docker/dev/compose.yaml exec php-fpm

build:
	docker-compose -f docker/dev/compose.yaml build

up:
	mkdir -p var/log && touch var/log/dev.log
	docker image pull php:8.3-fpm-alpine
	docker-compose -f docker/dev/compose.yaml up

clean:
	rm -rf docker/dev/postgres/data
	rm -rf docker/dev/nginx/log
	rm -rf vendor

install:
	$(php) composer install
	$(php) php bin/console doctrine:migration:migrate -n
	$(php) php bin/console doctrine:fixtures:load

shell:
	$(php) bash

lint:
	$(php) bin/console lint:container

test:
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console lint:container
	docker-compose -f docker/dev/compose.yaml exec php-fpm php vendor/bin/phpunit
	
