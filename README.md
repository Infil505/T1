# Sistema de Gestión de Autores, Libros y Editoriales 📚

Este es un sistema web desarrollado con Laravel para administrar información relacionada con autores, libros y editoriales. La aplicación permite registrar, visualizar, editar y eliminar estos elementos, y gestionar las relaciones entre ellos. El sistema incluye control de acceso, verificación de usuarios y enlaces cruzados entre entidades.



## 🛠️ Tecnologías Utilizadas

- PHP 8.4
- Laravel 12.2
- SQLite (puede cambiarse por otra DB)
- Blade (motor de vistas)
- Tailwind CSS (opcional)
- Laravel Breeze (si se usa autenticación básica)



## 📂 Estructura del Proyecto

- `AutorController`: gestiona autores y sus libros relacionados.
- `LibroController`: gestiona libros, mostrando autor y editorial.
- `EditorialController`: gestiona editoriales y sus libros publicados.
- Modelos: `Autor`, `Libro`, `Editorial` con relaciones entre sí.



## 🔐 Autenticación y Roles

- El sistema requiere inicio de sesión para acceder a funcionalidades protegidas.
- Solo usuarios verificados pueden crear, editar o eliminar datos.
- Se asume que el modelo `User` tiene un campo `is_admin` para distinguir roles (opcional).



## 🔄 Funcionalidades

### 👤 Autores

- Listado de autores registrados.
- Visualización de detalles y libros asociados.
- CRUD completo (solo usuarios verificados).
- Enlaces a libros relacionados.

### 📘 Libros

- Listado general de libros.
- Vista de detalle con autor y editorial enlazados.
- CRUD completo protegido.
- Asociación con autor y editorial en formularios.

### 🏢 Editoriales

- Lista de editoriales.
- Vista detallada con libros publicados.
- CRUD completo.
- Asociación de libros con editoriales.



## 🔗 Rutas Principales

| Recurso     | Ruta Base      | Ejemplo de Ruta Detallada            |
|-------------|----------------|--------------------------------------|
| Autores     | `/authors`     | `/authors/1`                         |
| Libros      | `/book`        | `/book/1`                            |
| Editoriales | `/publisher`   | `/publisher/1`                       |



## 🧠 Relaciones entre modelos

- Un **autor** tiene muchos **libros**
- Un **libro** pertenece a un **autor** y una **editorial**
- Una **editorial** tiene muchos **libros**

## 🚀 Cómo iniciar el proyecto

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/tu-repo.git
   cd tu-repo

##  instalar dependencias
composer install

##  configurar entorno
cp .env.example .env
php artisan key:generate

##  configurar base de datos
DB_CONNECTION=sqlite
DB_DATABASE=./database/database.sqlite

## Ejecutar migraciones
php artisan migrate

## lanzar la app
php artisan serve
