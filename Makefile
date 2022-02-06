init: docker-up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-build:
	docker-compose up --build -d

test:
	docker-compose exec php-cli vendor/bin/phpunit

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache

perm-www:
	sudo chgrp -R www-data storage bootstrap/cache

php-cli:
	docker-compose exec backend-php-cli bash

my-perm:
	sudo chown -R ${USER}:${USER} ./

perm-app:
	sudo chown -R ${USER}:${USER} app resources config database
