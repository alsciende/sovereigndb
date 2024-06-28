

build:
	docker-compose -f docker/dev/compose.yaml build

up:
	docker image pull php:8.3-fpm-alpine
	docker-compose -f docker/dev/compose.yaml up

clean:
	rm -rf docker/dev/postgres/data
	rm -rf docker/dev/nginx/log
	rm -rf vendor

install:
	docker-compose -f docker/dev/compose.yaml exec php-fpm composer install
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console doctrine:migration:migrate -n
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console doctrine:fixtures:load

shell:
	docker-compose -f docker/dev/compose.yaml exec php-fpm bash

test:
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console lint:container
	docker-compose -f docker/dev/compose.yaml exec php-fpm php vendor/bin/phpunit
	