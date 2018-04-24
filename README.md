# Upakaara

This contains the application code for the Upakaara. The app is build on top of [Laravel framework](http://laravel.com/docs) which runs on the LAMP stack.

## Setting up

Follow these steps to set up the project.

```
git clone https://github.com/upakaara/app.git
cd app/web
composer install
chmod -R 777 storage bootstrap/cache
cp .env.example .env
```

Change the values of the `.env` file as necessary.

## Running app using docker

Make sure you have Docker installed and running.

```
cp docker-compose.yml.example docker-compose.yml
```

Change values of the `yml` file if necessary (eg: port numbers)

```
docker-compose up -d
```

## Testing

You can execute the tests by running the following command.

```
./vendor/bin/phpunit --tap
```

## Deploying app to production

Follow the instructions mentioned [here](https://gist.github.com/malitta/d4b609c73eb78d5b5432e5afbd8a82ae).