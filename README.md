composer install
./vendor/bin/sail up -d
скопировать .env.example в .env
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
sail artisan scribe:generate

doc localhost/docs
