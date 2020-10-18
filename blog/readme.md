## How to run
1. Clone this repository `https://github.com/bobukonu/my-blog.git`
2. `composer install` or `composer update`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. Open `.env` file, fill in your database credentials on `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`
6. Then run `php artisan migrate --db:seed`
6. `php artisan serve`
7. Open your browser on `localhost:8000`
