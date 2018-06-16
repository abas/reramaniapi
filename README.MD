# RERAMANIAPI - PUSMARKER WEB SERVICE
{documentasi menyusul}

## System Requirement
- composer 1.6^=
- php 7.1^
- apache2
- laravel 5.6 support (wkwk)

## Deployment
this web service is build by laravel 5.6 php framework, to deploy this service follow the instruction bellow

> Create database on Web Server

first step to deploy this project, you need to create one database. like *just in case,.. create with name
`**db_reramaniapi**`

> Cloning

clone the project and enter into directory project
```
git clone https://github.com/abas/reramaniapi.git
cd reramaniapi
```

> Setting file `.env.ex` to `.env`


```
cp .env.ex .env
```

> Configure the environment file

open `.env` file then edit on line bellow
```
. . .
DB_DATABASE={DB_NAME}
DB_USERNAME={DB_USER}
DB_PASSWORD={DB_PASS}
. . .
```
insert {DB_NAME} with database name is already on web server `**db_reramaniapi**`, and change the {DB_USER} n {DB_PASS} to previllage access for database

> Install Vendor

laravel build with a nice library, and magic everywhere~ :v 
```
composer install
```

everything gonna be green/yellow/white while there is no error yet~

> Generating Key

```
php artisan key:generate
```

> Migrating Table

```
php artisan migrate
```

### well done~

## Note
to try is service is running as well, try to serve project
```
php artisan serve --port={port} --host=0.0.0.0
```
the host ip must 0.0.0.0 or you cant access the project with the local serve~
**then** open a URL like this `http://{ip_address}:port`

# APIDOC menyusul~