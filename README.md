# Ficha de Secuestros

Este repositorio contiene una API Laravel para gestionar fichas de registro de personas víctimas de secuestro, catálogos de rasgos físicos y autenticación basada en tokens con Laravel Sanctum.

- Documento de visión general y guía de uso: consulte `docs/PROJECT_OVERVIEW.md`.
- Requisitos rápidos:
  - PHP y Composer instalados; crear `.env` y configurar DB/APP_URL.
  - `composer install`, `php artisan migrate --seed` (si aplica), `php artisan storage:link`, `php artisan serve`.
  - Autenticación: POST `/api/auth/login` devuelve un token; úselo como `Authorization: Bearer <token>`.

Para información detallada de arquitectura, endpoints, validaciones y pruebas con los archivos de `tests/http`, ver `docs/PROJECT_OVERVIEW.md`.
