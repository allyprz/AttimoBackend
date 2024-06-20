
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://i.ibb.co/YcMWk7F/attimo.png" width="200" alt="Attimo Logo"></a></p>

# Attimo - Backend

Segunda parte del proyecto final para el curso TM-5100 (Desarrollo de Aplicaciones Interactivas II), el cual consistente en la implementación del backend de una página web para la organización académica con laravel. 

# Instrucciones

### Paso 1: Clonar el repositorio.
git clone `https://github.com/allyprz/AttimoBackend.git`
cd `attimoBackend`

### Paso 2: Instalar dependencias.
Ejecutar los siguientes comandos:
`npm install`
`composer install`

### Paso 3: Crear el archivo .env
Crear una copia del archivo .env.example y renombarla a .env con el comando `cp .env.example .env`.

### Paso 4 (Opcional): Crear la base de datos.
Crear una base de datos llamada `attimoBackend` en su servidor local (HeidiSQL en el caso de este proyecto).

### Paso 5: Modificar el archivo .env.
Editar el archivo .env para configurar la conexión a la base de datos local. Asegúrese de que los detalles de la base de datos son correctos y coinciden con el nombre del proyecto:
DB_DATABASE=attimoBackend

### Paso 6: Generar una clave de aplicación.
Ejecutar `php artisan key:generate`. En caso de fallar actualice composer con el comando `composer update`.

### Paso 7: Ejecutar las migraciones de la base de datos.
Ejecutar `php artisan migrate`

### Paso 8: Cargar los Seeders.
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

Si no se creó la base de datos manualmente en el paso 3 se le indicará que no existe una base de datos con dicho nombre y se le preguntará si desea crearla, se debe confirmar escribiendo 'yes'.

<!-- Copiar y pegar en la terminal:
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
### Paso 9: Encriptar las contraseñas de los usuarios.
Ejecutar `php artisan migrate:refresh --step=1 --path=/database/migrations/2024_06_16_234743_encrypt_existing_passwords.php`.

### Paso 10: Ejecutar el servidor de desarrollo.
Ejecutar `npm run dev`.

### Contribuidores (Nombre completo/Usuarios de github)
* Ashley Rojas Pérez, @allyprz
* Benjamin Paniagua Rojas, @benjaminpaniagua
* Krisly Arias Hidalgo, @krisarias

## Consideraciones
### Requerimientos de funcionalidad con attimo (front).
Mantener ambos proyecos corriendo con el `npm run dev`.

### Actualizar el estado de las actividades.
Ejecutar el comando `php artisan schedule:work` o `php artisan schedule:run`.
...
