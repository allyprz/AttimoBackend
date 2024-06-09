
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
Ejecutar:
`npm install`
`composer install`
`composer update`

### Paso 9: Cargar los Seeders.
Pegar el siguiente bloque de texto en la terminal:
- `php artisan db:seed --class=CourseSeeder`
- `php artisan db:seed --class=UsersTypeSeeder`
- `php artisan db:seed --class=UserSeeder`
- `php artisan db:seed --class=MajorSeeder`
- `php artisan db:seed --class=MajorsUserSeeder`
- `php artisan db:seed --class=QuestionSeeder`
- `php artisan db:seed --class=AnswerSeeder`
- `php artisan db:seed --class=QuestionsAnswerSeeder`
- `php artisan db:seed --class=GroupSeeder`
- `php artisan db:seed --class=MajorsCourseSeeder`
- `php artisan db:seed --class=UsersGroupSeeder`
- `php artisan db:seed --class=LabelsActivitySeeder`
- `php artisan db:seed --class=StatusActivitySeeder`
- `php artisan db:seed --class=CategoriesActivitySeeder`
- `php artisan db:seed --class=ActivitySeeder`
- `php artisan db:seed --class=ActivitiesGroupSeeder`
- `php artisan db:seed --class=ActivitiesUserSeeder`
- `php artisan db:seed --class=ActivitiesMajorSeeder`

<!-- Copiar:
php artisan db:seed --class=CourseSeeder
php artisan db:seed --class=UsersTypeSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=MajorSeeder
php artisan db:seed --class=MajorsUserSeeder
php artisan db:seed --class=QuestionSeeder
php artisan db:seed --class=AnswerSeeder
php artisan db:seed --class=QuestionsAnswerSeeder
php artisan db:seed --class=GroupSeeder
php artisan db:seed --class=MajorsCourseSeeder
php artisan db:seed --class=UsersGroupSeeder
php artisan db:seed --class=LabelsActivitySeeder
php artisan db:seed --class=StatusActivitySeeder
php artisan db:seed --class=CategoriesActivitySeeder
php artisan db:seed --class=ActivitySeeder
php artisan db:seed --class=ActivitiesGroupSeeder
php artisan db:seed --class=ActivitiesUserSeeder
php artisan db:seed --class=ActivitiesMajorSeeder
 -->

### Paso 9: Ejecutar el servidor de desarrollo.
Ejecutar `npm run dev`.

### Contribuidores (Nombre/Usuarios de github)
* Ashley Rojas Pérez, @allyprz
* Benjamin Paniagua Rojas, @benjaminpaniagua
* Krisly Arias Hidalgo, @krisarias

## Requerimientos

...
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>