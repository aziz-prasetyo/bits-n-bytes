<h1 align="center" style="margin-bottom: 48px;">Bits'n'Bytes</h1>

Anggota Kelompok:

- **Arya Bagus Farrazan - 2110511093**
- **Muhamad Aziz Prasetyo - 2110511095**
- **Nathanael Christian Albertus - 2110511113**
- **Silva Tulhasanah - 2110511099**

Mata Kuliah: **Pembangunan Perangkat Lunak Berorientasi Service**

Kelas: **B**

Dosen: **Muhammad Panji Muslim, S.Pd., M.Kom.**

---

# Proyek Bits'n'Bytes dengan Docker beserta Lingkungan Pengembangan dan Produksi

Dokumentasi ini menjelaskan bagaimana cara membangun dan menjalankan kontainer Docker untuk lingkungan pengembangan dan produksi menggunakan Makefile. Perintah-perintah yang tersedia di Makefile ini memudahkan Anda untuk mengelola lifecycle dari aplikasi berbasis Docker.

## Prasyarat

Sebelum menjalankan perintah-perintah di bawah ini, pastikan Anda telah menginstal Docker dan Docker Compose pada mesin Anda.

## Daftar Perintah

### build-dev

Perintah ini digunakan untuk membangun (build) image Docker untuk lingkungan pengembangan (development).

```sh
.PHONY: build-dev
build-dev: ## Build the development docker image.
	docker compose -f compose.dev.yaml build
```

Cara menjalankan:

```sh
make build-dev
```

### start-dev

Perintah ini digunakan untuk memulai (start) kontainer Docker untuk lingkungan pengembangan.

```sh
.PHONY: start-dev
start-dev: ## Start the development docker container.
	docker compose -f compose.dev.yaml up --watch
```

Cara menjalankan:

```sh
make start-dev
```

### stop-dev

Perintah ini digunakan untuk menghentikan (stop) kontainer Docker untuk lingkungan pengembangan.

```sh
.PHONY: stop-dev
stop-dev: ## Stop the development docker container.
	docker compose -f compose.dev.yaml down
```

Cara menjalankan:

```sh
make stop-dev
```

### build-prod

Perintah ini digunakan untuk membangun (build) image Docker untuk lingkungan produksi (production).

```sh
.PHONY: build-prod
build-prod: ## Build the production docker image.
	docker compose -f compose.prod.yaml build
```

Cara menjalankan:

```sh
make build-prod
```

### start-prod

Perintah ini digunakan untuk memulai (start) kontainer Docker untuk lingkungan produksi.

```sh
.PHONY: start-prod
start-prod: ## Start the production docker container.
	docker compose -f compose.prod.yaml up -d
```

Cara menjalankan:

```sh
make start-prod
```

### stop-prod

Perintah ini digunakan untuk menghentikan (stop) kontainer Docker untuk lingkungan produksi.

```sh
.PHONY: stop-prod
stop-prod: ## Stop the production docker container.
	docker compose -f compose.prod.yaml down
```

Cara menjalankan:

```sh
make stop-prod
```

## Penjelasan Perintah

- `.PHONY`: Menandai target makefile sebagai target "phony", artinya target ini tidak merujuk pada file dengan nama yang sama.
- `docker compose -f [file] [command]`: Menggunakan file Compose tertentu (`compose.dev.yaml` atau `compose.prod.yaml`) untuk menjalankan perintah Docker Compose seperti `build`, `up`, atau `down`.

Baca dokumentasi [Docker's Getting Started](https://docs.docker.com/go/get-started-sharing/)
untuk detail lebih lanjut tentang building dan pushing.

---

<p align="center">Dikembangkan dengan ❤️ oleh Arya, Aziz, Nathanael, dan Silva.</p>
