STEPS:-

-> composer install
-> create DB and connect with .env
-> php artisan vendor:publish --tag=settings
-> php artisan migrate
-> npm install

-> composer dump-autoload

// for creating fake services (with demo image)
-> php artisan tinker 
-> Services::factory()->count(4)->create()
