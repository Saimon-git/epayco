# EPayco

Backend soap con laravel

client con vuejs y tailwind

api con laravel y graphql

### Descripción 📋

soap tiene el proyecto laravel
rest tiene el proyecto laravel con graphql


### Instalación 🔧

La conexión a la base de dato se configura en el archivo .env de  dentro del directorio soap.

Entrar en el directorio soap y ejecutar 
```
composer install
php artisan key:generate
php artisan migrate
```
Para el api ingresar a la carpeta wallet y ejecutar
```
composer install
php artisan key:generate
npm run install & npm run dev
```



## cleinte

El directorio client tiene un pequeño cliente para probar los endpoints, estos estan apuntando a la url http://localhost:3000/api/ por lo tanto si no se modifica el puerto del api, funcionaria sin ningún cambio.

Entrar en el directorio rest y ejecutar 
```
npm start
```


## Autor ✒️

* **Simon Montoya** - [Saimon-git/](https://github.com/Saimon-git/)
