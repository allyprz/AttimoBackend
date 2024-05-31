
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://i.ibb.co/YcMWk7F/attimo.png" width="200" alt="Attimo Logo"></a></p>

# Attimo - Backend

Segunda parte del proyecto final para el curso TM-5100 consistente en la implementación del backend de una página web para la organización académica. 

# Instrucciones

### Paso 1: Clonar el repositorio
git clone <URL_DEL_REPOSITORIO>
cd <NOMBRE_DEL_PROYECTO>

### Paso 2: Crear el archivo .env
Crear una copia del archivo .env.example y renombarla a .env con el comando `cp .env.example .env`.

### Paso 3: Crear la base de datos.
Crear una base de datos llamada `attimoBackend` en su servidor local (HeidiSQL en el caso de este proyecto)

### Paso 4: Modificar el archivo .env.
Editar el archivo .env para configurar la conexión a la base de datos local. Asegúrese de que los detalles de la base de datos son correctos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attimoBackend

### Paso 5: Generar una clave de aplicación.
Ejecutar `php artisan key:generate`

### Paso 6: Migrar la base de datos.
Ejecutar `php artisan migrate`

### Paso 7: Instalar dependencias.
Ejecutar `Ejecutar `php artisan migrate`

### Paso 8: Ejecutar el servidor de desarrollo.
Ejecutar `npm run dev`.

### Contribuidores (Nombre/Usuarios de github)
* Ashley Rojas Pérez, @allyprz
* Benjamin Paniagua Rojas, @benjaminpaniagua
* Ian, @PuzzledStone
* Krisly, @krisarias


## Requerimientos

...
