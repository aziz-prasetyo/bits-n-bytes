.PHONY: build-dev
build-dev: ## Build the development docker image.
	docker compose -f compose.dev.yaml build

.PHONY: start-dev
start-dev: ## Start the development docker container.
	docker compose -f compose.dev.yaml up --watch

.PHONY: stop-dev
stop-dev: ## Stop the development docker container.
	docker compose -f compose.dev.yaml down

.PHONY: build-prod
build-prod: ## Build the production docker image.
	docker compose -f compose.prod.yaml build

.PHONY: start-prod
start-prod: ## Start the production docker container.
	docker compose -f compose.prod.yaml up -d

.PHONY: stop-prod
stop-prod: ## Stop the production docker container.
	docker compose -f compose.prod.yaml down