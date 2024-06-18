build:
	docker-compose -f docker/dev/compose.yaml build

up:
	docker-compose -f docker/dev/compose.yaml up

clean:
	rm -rf docker/dev/postgres/data
	rm -rf docker/dev/nginx/log
	rm -rf vendor

install:
	docker-compose -f docker/dev/compose.yaml exec php-fpm composer install

shell:
	docker-compose -f docker/dev/compose.yaml exec php-fpm bash

