current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: start
start:
	docker-compose up -d --build

.PHONY: stop
stop:
	docker-compose stop

.PHONY: down
down:
	docker-compose down -v

.PHONY: deps
deps:
	docker-compose exec app composer install

.PHONY: test
test:
	docker-compose exec app composer test