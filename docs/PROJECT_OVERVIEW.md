# Ficha de Secuestros – Visión General del Proyecto

Este proyecto es una API construida con Laravel orientada a gestionar fichas de registro relacionadas con personas víctimas de secuestro, así como catálogos de rasgos físicos. Incluye autenticación con Laravel Sanctum, recursos REST para catálogos y para registros, y carga/almacenamiento de fotografías con procesamiento de imágenes.

## Arquitectura y componentes principales

- Autenticación (Sanctum):
  - Login y logout en `routes/api.php` bajo prefijo `/api/auth`.
  - `App\Http\Controllers\AuthController`: crea tokens Sanctum en login y los revoca en logout.
  - `App\Http\Requests\Auth\LoginRequest` (no mostrado aquí) valida credenciales.
- Registros (FichaRegistro):
  - Modelo: `App\Models\FichaRegistro` (tabla `fichas_registro`, SoftDeletes, casts para fechas, relación `sexo()`).
  - Controlador: `App\Http\Controllers\RegisterController` con CRUD + `uploadPicture`.
  - Resource: `App\Http\Resources\RegisterResource` da formato a la salida (fechas, campos y fotografía con imagen por defecto o base64).
  - Requests: `CreateFichaRegistroRequest` para validación de creación, `ValidateImageRequest` para validar la imagen.
  - Almacenamiento de imágenes: disco `public`, carpeta `fichas/`; procesamiento con `intervention/image`.
- Catálogos (rasgos físicos):
  - Controladores: `CatalogoSexoController`, `CatalogoComplexionController`, `CatalogoTezController`, `CatalogoFrenteController`, `CatalogoCejasController`, `CatalogoOjosController`, `CatalogoNarizController`, `CatalogoBocaController`, `CatalogoMentonController`, `CatalogoCaraController`.
  - Todos expuestos como `apiResources` y protegidos por `auth:sanctum`.

## Rutas principales (routes/api.php)

- Autenticación (`/api/auth`):
  - POST `/login` (guest): devuelve `{ data: { user, token } }`.
  - POST `/logout` (auth:sanctum): revoca token(s).
- Recursos protegidos (auth:sanctum):
  - `Route::apiResources([...])` para: `sexo`, `complexion`, `tez`, `frente`, `ceja`, `ojo`, `nariz`, `boca`, `menton`, `cara`, `registros`.
  - POST `/registros/{registro}/fotografia`: carga y asocia fotografía al registro.
  - GET `/dashboard/estadisticas`: estadísticas para dashboard (totales, por sexo, por mes últimos 12 meses, con/sin fotografía) y bloque "hoy" (totales del día, por sexo hoy, con/sin fotografía hoy).

## Flujo de autenticación (Sanctum)

1. Login: POST `/api/auth/login` con `email` y `password`.
   - Si `remember` es `true`, el token dura 24 horas; de lo contrario, 30 minutos.
   - Se devuelve `token` Bearer.
2. Logout: POST `/api/auth/logout` con `Authorization: Bearer <token>`.
   - Se eliminan los tokens del usuario autenticado.

## Registros (FichaRegistro)

- Listado y búsqueda: `GET /api/registros?limit=10&search=terminos` (paginado). El parámetro `search` se separa por espacios y aplica coincidencias parciales sobre `nuc`, `nombre` y apellidos.
- Creación: `POST /api/registros` con payload validado por `CreateFichaRegistroRequest`.
- Detalle: `GET /api/registros/{id}`.
- Actualización: `PUT/PATCH /api/registros/{id}`.
- Eliminación: `DELETE /api/registros/{id}`. Intenta eliminar la fotografía (si existe y no es default) y borra lógicamente el registro.
- Carga de fotografía: `POST /api/registros/{id}/fotografia` con campo `image` (jpg/jpeg/png, máx. 2MB). Se redimensiona con Intervention Image a los tamaños definidos en `config('image.storage_sizes')` y se guarda en `storage/app/public/fichas/`.

### Respuesta del Resource

`App\Http\Resources\RegisterResource` devuelve:
- Datos generales (nombres, fechas formateadas `d/m/Y`, rasgos, etc.).
- `sexo` y `idSexo` (vía relación con `CatalogoSexo`).
- `fotografia`: URL pública (si existe) o imagen por defecto según sexo (`public/img/default_male.png` o `public/img/default_female.png`).
- `encodedImage`: imagen en Base64 (si hay fotografía) o la imagen por defecto en Base64.

## Requisitos y configuración

- Paquetes clave: Laravel, Sanctum, Intervention Image.
- Enlaces de almacenamiento: ejecutar `php artisan storage:link` para servir archivos del disco `public`.
- Imágenes por defecto: ubicadas en `public/img/default_male.png` y `public/img/default_female.png`.
- Config de tamaños de imagen: `config('image.storage_sizes.width|height')` debe existir; de lo contrario, ajuste `RegisterController@uploadPicture`.

## Ejecución local

1. Instalar dependencias: `composer install` y `npm install` (si aplica).
2. Configurar `.env` (DB, SANCTUM, APP_URL, etc.).
3. Migraciones y seeders: `php artisan migrate --seed` (si hay seeders de catálogos).
4. Crear enlace de storage: `php artisan storage:link`.
5. Levantar servidor: `php artisan serve` (por defecto http://localhost:8000).

## Pruebas de cliente HTTP (tests/http)

- Archivo de entorno: `tests/http/http-client.env.json` con `api: http://localhost:8000/api`.
- Autenticación: `tests/http/auth.http` para `POST /auth/login` y guardar `{{token}}` global; luego `POST /auth/logout`.
- Registros: `tests/http/registros.http` incluye ejemplo `GET /registros/3` con `Authorization: Bearer {{token}}`.

## Notas y consideraciones

- Validación:
  - `CreateFichaRegistroRequest` permite muchos campos como `nullable` y valida tipos/longitudes; revise las reglas para su caso de uso (por ejemplo, `edad` es `string` aunque los mensajes mencionan `integer`).
  - `ValidateImageRequest` restringe a jpg/jpeg/png y 2MB.
- Seguridad: todas las rutas de catálogos y registros están detrás de `auth:sanctum`. Asegúrese de configurar correctamente CORS y cookies si se usa SPA.
- Borrado: `FichaRegistro` usa SoftDeletes; las consultas por defecto no devuelven eliminados a menos que se use `withTrashed()`.

---
Última actualización: 2025-08-25.
