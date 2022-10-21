# Delfosti Test


## Pasos para desplegar el proyecto en local con Docker

Requisitos

- Instalar y mantener ejecutando [Docker Desktop](https://www.docker.com/products/docker-desktop/)

1) Clonar el proyecto

2) Instalar dependencias
```
composer install
```

3) Generar APP_KEY
```
./vendor/bin/sail artisan key:generate
```

4) Despues de clonar el proyecto, copiar ```.env.example``` => ```.env```

5) En una terminal, posicionarse en la raiz del proyecto y ejecutar:

```
./vendor/bin/sail up
```

6) Ejecutar las migraciones y seeders:

 ```
./vendor/bin/sail artisan migrate:fresh --seed
```

## Pasos para desplegar el proyecto en local con herramientas de desarrollo: Laragon

Requisitos

- PostgreSql ejecutando (incluido en laragon)
- PHP 8.1+  (incluido en laragon)

1) Clonar el proyecto

2) Instalar dependencias
```
composer install
```

3) Generar APP_KEY
```
php artisan key:generate
```

4) Despues de clonar el proyecto, copiar ```.env.example``` => ```.env``` 
   - Modificar las variables de entorno segun las credenciales del servicio de PostgreSql en local

5) Crear la BD, ejecutar las migraciones y seeders:
 ```
php artisan migrate:fresh --seed
```


## Para ejecutar los test:

- Docker
```
./vendor/bin/sail artisan test --env=env
```

- Herramientas de desarrollo
```
php artisan test --env=env
```


## Documentacion de API 

# Buscar articulos
```
[GET] localhost:80/api/articles/search
[Url Params] 
    - page : Numero de pagina
    - q: Filtro de texto para buscar por nombre o descripcion
    - categories[]: Filtro para buscar por categoria a la que pertenece
```
- Ejemplo
```
// Buscar por pagina y filtro de texto
[GET] localhost:80/api/articles/search?page=1&q=iPhone
```

```
// Buscar por categorias con id 1 y 2
[GET] localhost:80/api/articles/search?page=1&categories[]=1&categories[]=2
```
