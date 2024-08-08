# Laravel 9 Patient API
Using Laravel 9, Docker, and PostgreSQL

### Requirements
* Docker Download and Install Docker. [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
* PHP 8.1 on Brew -> [https://formulae.brew.sh/formula/php@8.1](https://formulae.brew.sh/formula/php@8.1)
* Composer

### Installation
#### 0. Clone this project

#### 1. Create new `.env` file from `.env.example` in root directory

#### 2. Run command `make build` on your terminal

#### 3. Run command `make up` on your terminal

#### 4. Run command `make ex` on your terminal

#### 5. Adjust `.env` file in `/src` directory
This action will be automatically done. If you can't do it, do it manually

#### 6. Go to [http://localhost:8000/](http://localhost:8000/)

### Makefile
>Makefile command can be run on the project root directory, where `Makefile` resides in.
* `make build` : build Docker Compose containers
* `make up` : run Docker Compose containers
* `make stop` : stop Docker Compose containers
* `make down` : remove Docker Compose containers
* `make purge` : remove Postgres SQL volume in host.
* `make ex` : open PHP container terminal
* `make analyse` : run static analysis and store the result in `/src/storage/logs/analyse.log`


### Suggestions
After the above steps, you can run the following commands to run the project.
* `docker exec -it laravel_docker_php bash` 
* `composer install` 
* `php artisan migrate` 
* `php artisan db:seed` 
* [http://localhost:8000/login](http://localhost:8000/login) : open in browser then login with email: `admin@admin.com` and password: `password`
* or [http://localhost:8000/register](http://localhost:8000/register) : open in browser then register new user
#### that's it, you can start to develop my case.
