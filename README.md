# DESARROLLO
Nota:
El script combinado con cocurrently solo usar con Docker:
"local": "docker compose up -d &&  concurrently \"npm run dev\" \"php artisan serve\" "


## Comandos para despliegue en desarrollo:

1. Instala las dependencias de Composer. Crea la carpeta vendor:
`composer update` /o/ `composer install`

2. Corre el servidor y la parte backend para la app Laravel:
`php artisan serve`

3. Instala las dependencias de NPM. Crea la carpeta node_modules:
`npm i` /o/ `npm install`

4. Corre la parte frontend de la app con Vite:
`npm run dev`

5. Para producción -> una vez que queremos publicar en GitHub Pages, por ejemplo. Crea las carpetas:
public/build/manifest.json
public/build/assets/*.js
public/build/assets/*.css
`npm run build`

## Carpetas directorios y ficheros de trabajo

1. /routes -> web.php

2. /resources -> /views ...

3. /database -> /factories /migrations /seeders

4. /app -> /Http/Controllers/Middleware/Requests
5. /app -> /Models -> User.php ...


Crear el Modelo:
sin migración:
php artisan make:model Product 
con migración:
php artisan make:model Product -m
php artisan make:model Product --migration

en database/migration definimos los campos schema de la tabla

Ejecutamos la migración:
php artisan migrate

Vamos al phpmyadmin para comprobar que ya está la tabla en la BBDD

Crear el controllador:
php artisan make:controller ProductController

php artisan make:seeder ProductSeeder

🔵 Ejecutar el seeder
Para ejecutar todos los seeders registrados:

bash
php artisan db:seed

Para ejecutar solo uno:

bash
php artisan db:seed --class=ProductSeeder

🔵 Si quieres reiniciar la base de datos y sembrar todo
php artisan migrate:fresh --seed


limpieza de la caché de las rutas:
php artisan route:clear
php artisan route:list
