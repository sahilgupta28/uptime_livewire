### What do I need?
1. Git - To clone the code
2. Docker and docker-compose - To run the app

### How do I run this locally?
```
docker-compose up -d
```
_This will take a little while to download the images and build the containers_
```
http://200.20.1.1
```

### What services are running, and how are they configured?
Docker-compose based containerised setup having 6 services
1. `web` : Service serving the main Laravel web app
   1. Uses `dockerfiles/Web.Dockerfile` to build the image
   2. ENTRYPOINT `dockerfiles/web-runner` contains following commands [for setting up the app]
      1. `composer install`
      2. `npm install`
      3. `composer run dev`
      4. `git config --global --add safe.directory /var/www/html`
      5. `git config core.filemode false`
      6. `apache2-foreground` : Starts the apache server in foreground mode [default behaviour of the base image: `php:8.2-apache`]

2. `pg` : Postgres DB service
   1. Has 2 databases
   2. `postgres` as the primary DB, for the web-app
   3. `testing` as the test DB, for Pest/PhpUnit
   4. Credentials are `postgres/password` for both DBs
3. `q` : Always-on queue service
   1. Uses `dockerfiles/QueueListener.Dockerfile` to build the image
   2. ENTRYPOINT `dockerfiles/queue-listener` contains following command
      1. `php artisan queue:listen` : Starts listening to the queue
4. `mailpit` : For capturing emails in development environments [super awesome]
   1. Default port is `8025`
5. `0x` : Without xdebug, to run test-cases faster[without coverage] than the `web` service
   1. Uses `dockerfiles/SansXdebug.Dockerfile` to build the image
6. `fe` : Runs `npm run dev` in the background, without you having the need to manually start/stop asset compilation
   1. Uses `dockerfiles/Fe.Dockerfile` to build the image
   2. ENTRYPOINT `dockerfiles/fe-runner` contains following commands
      1. `npm run dev` for asset compilation


### What is in the box?
1. Laravel 10.x
2. Default Breeze setup : Login and Register links are on the homepage [top-right]
3. Admin login is at `/admin` and credentials are `admin@admin.com/admin` - you will need to run `php artisan db:seed` before using the credentials [seeders are NOT run when setting up the app using the docker-compose]
4. Home page, User section and Admin section - all in dark mode
