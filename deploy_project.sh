cd  ~/test-api &&
git fetch origin master &&
git pull origin master &&
git merge master &&
docker-compose run --rm php-cli php artisan migrate
