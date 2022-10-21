# Delfosti Test

Requisitos

- Instalar Docker Desktop [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Pasos para desplegar el proyecto en local

1) Copiar ```.env.example``` => ```.env```

2) En una terminal, posicionarse en la raiz del proyecto y ejecutar:

```
./vendor/bin/sail up
```

3) Ejecutar las migraciones y seeders:

 ```
./vendor/bin/sail artisan migrate:fresh --seed
```

## Para ejecutar los test:

```
./vendor/bin/sail artisan test --env=env
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
