STEPS:-

-> composer install

-> create DB and connect with .env

-> php artisan vendor:publish --tag=settings

-> php artisan migrate

-> npm install

-> php artisan serve

-> credentials (email:ahtesham2000@gmail.com | password:23988725)

<!-- composer dump-autoload -->

// for creating fake services (with demo image)
-> php artisan tinker 
-> Services::factory()->count(4)->create()
