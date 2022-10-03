# Funcionamiento

Esta interfaz API consiste en una serie de rutas con diversas funcionalidades que pueden ser usadas por otras aplicaciones de manera independiente. Su tarea consiste en crear las funciones de creación, lectura, actualización y eliminación de registros, además de mostrar una lista de búsqueda avanzada, aceptando información en formato JSON.

# Librerías

No fue necesario usar librerías externas mas allá de las incluidas dentro de Laravel.

## Create files and folders

The file explorer is accessible using the button in left corner of the navigation bar. You can create a new file by clicking the **New file** button in the file explorer. You can also create folders by clicking the **New folder** button.

## Requisitos

-   Tener instalador una pila para desarrollar apliaciones en PHP. Recomiendo [XAMPP](https://www.apachefriends.org/es/index.html)
-   Tener instalador [Composer](https://getcomposer.org/).

## Crear entorno

1. Dentro de la carpeta del proyecto, abrir terminal y ejecutar el comando "composer install" para descargar los paquetes de laravel.
2. Configurar las variables de entorno (.env) y colocar las credenciales del motor de base de datos. Ejemplo de variables con mysql:

    -DB_CONNECTION=mysql
    -DB_HOST=127.0.0.1
    -DB_PORT=3306
    -DB_DATABASE=example_app
    -DB_USERNAME=root
    -DB_PASSWORD=

3. En la misma consola, ejecutar el comando "php artisan migrate" para crear las tablas del proyecto y una base de datos aparte para el mismo.
4. Por último, en la misma consola, ejecutar "php artisan serve" para iniciar el proyecto. A partir de aquí, puede acceder a las rutas y ver los resultados.

## Estructura de carpetas

Usando la estructura de laravel, más detalles [aquí](https://laravel.com/docs/9.x/structure), la funcionalidad esta dividida en:

-   app/Http/Controller.
-   app/Models.
-   -app/Helpers.
-   routes/api.php.

# URLs

### Crear nuevos registros

Crea un nuevo registro.

#### Cuerpo

{
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": "123456789",
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": false,
"Observacion": "Nada que comentar"
}

#### Ruta:

-   Método: POST.
-   Url: http://127.0.0.1:8000/api/residents.

#### Retorno

{
"success": true,
"status": 201,
"code": "success",
"message": "Registro creado con exito",
"data": {
"Nombre": "Karlyn",
"Apellidos": "Garcia",
"Telefono": "123456789",
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": false,
"Observacion": "Nada que comentar",
"updated_at": "2022-10-03T03:17:18.000000Z",
"created_at": "2022-10-03T03:17:18.000000Z",
"id": 5
}
}

### Lista de registros

Retornara un listado completo de todos los registros.

#### Ruta

-   método: GET.
-   Url: http://127.0.0.1:8000/api/residents

#### Retorno

{
"success": true,
"status": 200,
"code": "success",
"message": "Listado de registros",
"data": [
{
"id": 1,
"created_at": "2022-10-02T21:11:32.000000Z",
"updated_at": "2022-10-03T02:13:58.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
},
{
"id": 3,
"created_at": "2022-10-02T22:24:06.000000Z",
"updated_at": "2022-10-02T22:24:06.000000Z",
"Nombre": "Warlyn2",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
},
{
"id": 4,
"created_at": "2022-10-02T23:35:26.000000Z",
"updated_at": "2022-10-02T23:35:26.000000Z",
"Nombre": "Zarlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 10,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
},
{
"id": 5,
"created_at": "2022-10-03T03:17:18.000000Z",
"updated_at": "2022-10-03T03:17:18.000000Z",
"Nombre": "Karlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 0,
"Observacion": "Nada que comentar"
}
]
}

### Buscar un registro

Retorna la información de un registro.

#### Parámetros

-   id: clave primaria en la base de datos del registro.

#### Ruta:

-   Método: GET.
-   Url: http://127.0.0.1:8000/api/residents/{id}

#### Retorno

{
"success": true,
"status": 202,
"code": "success",
"message": "Registro encontrado",
"data": {
"id": 1,
"created_at": "2022-10-02T21:11:32.000000Z",
"updated_at": "2022-10-03T02:13:58.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
}
}

### Eliminar un registro

Elimina un registro de la base de datos.

#### Parámetros

-   id: clave primaria en la base de datos del registro.

#### Ruta:

-   Método: DELETE.
-   Url: http://127.0.0.1:8000/api/residents/{id}

### Editar un registro

Edita la información de un registro existente en la base de datos.

#### Parámetros

-   id: clave primaria en la base de datos del registro.

#### Cuerpo

{
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": "123456789",
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": false,
"Observacion": "Nada que comentar"
}

#### Ruta:

-   Método: PUT.
-   Url: http://127.0.0.1:8000/api/residents/{id}.

#### Retorno

{
"success": true,
"status": 203,
"code": "success",
"message": "Registro actualizado",
"data": {
"id": 5,
"created_at": "2022-10-03T03:17:18.000000Z",
"updated_at": "2022-10-03T03:23:23.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": "123456789",
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": true,
"Observacion": "Nada que comentar"
}
}

### Búsqueda de registros

Buscar registros por ID, Nombre o Correo.

#### Cuerpo

{
"search": "Warlyn",
}

#### Ruta:

-   Método: POST.
-   Url: http://127.0.0.1:8000/api/search/residents.

#### Retorno

{
"success": true,
"status": 200,
"code": "success",
"message": "Listado de registros",
"data": [
{
"id": 5,
"created_at": "2022-10-03T03:17:18.000000Z",
"updated_at": "2022-10-03T03:23:23.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
},
{
"id": 6,
"created_at": "2022-10-03T03:17:18.000000Z",
"updated_at": "2022-10-03T03:23:23.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
}
]
}

### Lista avanzada de registros

Lista de registros con opciones para paginar y ordenar. En caso de no colocar nada, los parámetros tendrán valores por defecto.

Una vez se defina el límite de registros, podrá colocar las páginas que estén disponibles en el listado. Ejemplo: ?page=2 al final de una lista filtrada retornara la lista en la página 2 de la base de datos.

#### Parámetros

-   order: Columna por la que se ordenara la lista.
-   sort: Orden de la lista, ascendente (asc) o descendente (desc).
-   limit: cantidad de registros que mostrara. Si se coloca

#### Ruta:

-   Método: GET.
-   Url: http://127.0.0.1:8000/api/list/residents/{order}/{sort}/{limit}.

#### Retorno

{
"success": true,
"status": 200,
"code": "success",
"message": "Listado de registros",
"data": {
"current_page": 1,
"data": [
{
"id": 6,
"created_at": "2022-10-03T03:25:13.000000Z",
"updated_at": "2022-10-03T03:25:13.000000Z",
"Nombre": "Karlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 10,
"Direccion": "Las caobas",
"Comida_Entregada": 0,
"Observacion": "Nada que comentar"
},
{
"id": 7,
"created_at": "2022-10-03T03:25:17.000000Z",
"updated_at": "2022-10-03T03:25:17.000000Z",
"Nombre": "Karlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 19,
"Direccion": "Las caobas",
"Comida_Entregada": 0,
"Observacion": "Nada que comentar"
},
{
"id": 5,
"created_at": "2022-10-03T03:17:18.000000Z",
"updated_at": "2022-10-03T03:23:23.000000Z",
"Nombre": "Warlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 24,
"Direccion": "Las caobas",
"Comida_Entregada": 1,
"Observacion": "Nada que comentar"
},
{
"id": 8,
"created_at": "2022-10-03T03:25:21.000000Z",
"updated_at": "2022-10-03T03:25:21.000000Z",
"Nombre": "Karlyn",
"Apellidos": "Garcia",
"Telefono": 123456789,
"Correo": "Warlyn200@gmail.com",
"Edad": 59,
"Direccion": "Las caobas",
"Comida_Entregada": 0,
"Observacion": "Nada que comentar"
}
],
"first_page_url": "http://127.0.0.1:8000/api/list/residents/edad/asc?page=1",
"from": 1,
"last_page": 1,
"last_page_url": "http://127.0.0.1:8000/api/list/residents/edad/asc?page=1",
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/list/residents/edad/asc?page=1",
"label": "1",
"active": true
},
{
"url": null,
"label": "Next &raquo;",
"active": false
}
],
"next_page_url": null,
"path": "http://127.0.0.1:8000/api/list/residents/edad/asc",
"per_page": 10,
"prev_page_url": null,
"to": 4,
"total": 4
}
}
