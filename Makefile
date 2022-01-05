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
deps: start
	docker exec testing-course-app composer install

.PHONY: test
test: start
	docker exec testing-course-app composer test

.PHONY: fix-style
fix-style:
	docker exec testing-course-app composer fix-style
