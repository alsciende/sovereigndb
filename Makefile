build:
	docker-compose -f docker/dev/compose.yaml build

up:
	docker-compose -f docker/dev/compose.yaml up

clean:
	rm -rf docker/dev/postgres/data
	rm -rf docker/dev/nginx/log
	rm -rf docker/dev/couchdb/data/
	rm -rf vendor

install:
	docker-compose -f docker/dev/compose.yaml exec php-fpm composer install
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console doctrine:migration:migrate -n
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console doctrine:fixtures:load
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console couchdb:database:create
	docker-compose -f docker/dev/compose.yaml exec php-fpm php bin/console couchdb:cards:send

shell:
	docker-compose -f docker/dev/compose.yaml exec php-fpm bash

