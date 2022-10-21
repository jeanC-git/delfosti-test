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
