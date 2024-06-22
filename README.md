Aun con los commits es mejor que coloquen los cambios que hacemos en el readme hasta que finalice el proyecto como incluir los comandos para ejecutar el proyecto y esas vainas(en mi caso no le agarro todavia la onda)

#CONFIGURACION BASE DE DATOS .env DB_CONNECTION=mysql DB_HOST=82.180.153.1 DB_PORT=3306 DB_DATABASE=u907013585_software DB_USERNAME=u907013585_software DB_PASSWORD=Otrodiaenelproyecto1*

Comandos para instalar el proyecto:

composer install

php artisan key:generate

php artisan migrate --seed

npm install

Comandos para crear tablas:

php artisan make:migration create_nombre_de_la_tabla_table

que esten en orden, luego editar los archivos creados y luego un

php artisan migrate

se puede hacer php migrate rollback o reset tambien por si estaban mal configuradas las migraciones

para editar tablas hay que crear una nueva migracion, el nombre sera diferente porque se genera por fecha y hora, y ahi se hace la modificacion

//insertar datos del usuario
php artisan db:seed
