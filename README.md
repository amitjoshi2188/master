To run the project need to do below steps.

composer install : to install dependency.

php artisan migrate : to import tables structure.

php artisan db:seed --class=UserSeeder : for creating default login details for dashboard (email : admin@admin.com, password : "password").

php artisan serve : to start the project.