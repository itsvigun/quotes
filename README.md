### Installation
1. Run inside 'docker' folder

    `docker-compose up -d`

2. Set %DB_HOST% parameter

    get CONTAINER ID for postgresql container by this command:
    
    `docker ps`
    
    replace `%CONTAINER_ID%` and run following command:
    
    `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' %CONTAINER_ID%`
    
    set `%DB_HOST%` parameter in `app/.env`

3. Run `composer install`

4. Go to php-fpm container in 'docker' folder':

    `docker-compose exec php-fpm bash`

5. Run migrations inside php-fpm docker container:

    `bin/console doctrine:migrations:migrate`

6. Run fixtures to generate fake data in Database:

    `bin/console doctrine:fixtures:load -n`

7. to enter to DB environment use

    `docker-compose exec postgres bash`

8. inside environment use

    `psql db_name db_user`

### API Routes:
1. Get authors and quote types ids:
    `GET /authors`
    `GET /quote-types`
    
2. CRUD for Quotes:
    `POST /quote`
    `GET /quote/{id}`
    `PUT /quote/{id}`
    `DELETE /quote/{id}`
