
# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

====================================//////////////////////////#################================================================

locale: /Users/mohammadselimmiah/Sites/Api/ApiDingo
https://tuts.codingo.me/dingo-api-quick-start
https://www.youtube.com/watch?v=r40yAZAi6PQ&list=PLpvpznviFFFJUWlHylwipLLr1iLYs-cft
https://github.com/Zizaco/entrust#installation

Add "phpdocumentor/reflection": "3.x@dev" under "require": { } in composer.json and run a composer update

"require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "phpdocumentor/reflection": "3.x@dev"
},

$ composer update
$ composer require dingo/api:1.0.x@dev

after successful command this will add "dingo/api": "1.0.x@dev" under require.

"require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "phpdocumentor/reflection": "3.x@dev",
        "dingo/api": "1.0.x@dev"
}

add in Config\app.php service providers
Dingo\Api\Provider\LaravelServiceProvider::class

$ php artisan vendor:publish --provider="Dingo\Api\Provider\LaravelServiceProvider"
Copied File [/vendor/dingo/api/config/api.php] To [/config/api.php]
Publishing complete for tag []!

add following variables to .env:
API_STANDARDS_TREE=vnd
API_SUBTYPE=dingo-api-guide
API_DOMAIN=dingo-api-definitive-guide.dev
API_VERSION=v1
API_NAME="Dingo API Definitive Guide"

'debug' => env('API_DEBUG', true),

routes.php.
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->get('hello', function () {
        return 'It is ok';
    });

});


$ php artisan api:route or $ php artisan api:routes //same

take the route uri and browse
http://localhost:8000/api/hello

Create HomeController
$ php artisan make:controller HomeController --resource

add the HomeController with namespace otherwise it will through error

$api->version('v1', function ($api) {
    $api->get('hello', 'App\Http\Controllers\HomeController@index');
});


$ mysql -u root -p
Enter password: root

mysql> show databases;
mysql> drop database ApiDingoDb
    -> ;
mysql> create database ApiDingoDb;

modify .env
DB_CONNECTION=mysql
DB_HOST=localhost:8889
DB_DATABASE=ApiDingoDb
DB_USERNAME=root
DB_PASSWORD=root

$ composer require laracasts/generators --dev

App\Providers\AppServiceProvider

Copy register from https://github.com/laracasts/Laravel-5-Generators-Extended

public function register()
{
    if ($this->app->environment() == 'local') {
        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    }
}


https://github.com/Zizaco/entrust

Install Entrust:
Just add "zizaco/entrust": "5.2.x-dev" under require-dev to your composer.json. Then run composer install or composer update.

or simply run following single command
$ composer require zizaco/entrust:5.2.x-dev

this will install zizaco under vendor folder

Setup dependency at config/app.php similar to Dingo
Zizaco\Entrust\EntrustServiceProvider::class,

in aliases/
'Entrust'   => Zizaco\Entrust\EntrustFacade::class,

App\Http\Kernel $routeMiddleware
'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
 'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
    'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,

$ php artisan vendor:publish
Copied File [/vendor/zizaco/entrust/src/config/config.php] To [/config/entrust.php]
Publishing complete for tag []!
this will create entrusst.php under config folder

User relation to roles
Now generate the Entrust migration:
php artisan entrust:migration

EntrustSetupTables migration created in database/migrations directory

$ php artisan migrate

mysql> use ApiDingoDb;
mysql> show tables;


Now create Model for tables:
$ php artisan make:model Role
$ php artisan make:model Permission

instead of extending Model, we will extend EntrustRole in App\Role model
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
}

same for Pemission model
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission

Now modify User model


stop & start server: php artisan serve

http://localhost:8000/api/hello in the browser will return empty array

$ curl --request GET http://localhost:8000/api/hello
[]

$ curl --request GET http://localhost:8000/api/hello
{"users":[{"id":1,"name":"John Doe","email":"john.doe@gmail.com","created_at":"2016-07-27 13:12:53","updated_at":"2016-07-27 13:12:53"},{"id":2,"name":"John1 Doe1","email":"john.doe1@gmail.com","created_at":"2016-07-27 13:16:05","updated_at":"2016-07-27 13:16:05"}]}

$ php artisan make:seed User

mysql> describe roles;

<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description = 'User is an owner of a given project';
        $owner->save();

        $owner = new Role();
        $owner->name = 'admin';
        $owner->display_name = 'Project Admin';
        $owner->description = 'User is an Admin of a given project';
        $owner->save();

    }
}


$ composer dump-autoload  //this command is must for db seeding
$ php artisan db:seed --class=RoleSeeder 

 [BadMethodCallException]                    
  This cache store does not support tagging.

So, we have to change .env
CACHE_DRIVER=array  

mysql> insert into `roles` (`name`, `display_name`, `description`, `updated_at`, `created_at`  
  ) values ("manager", "Project Manager", "User is an manager of a given project", '2016-07-27 11:44:46', '2016-07-27 11:44:46') ; 

mysql> insert into `roles` (`name`, `display_name`, `description`, `updated_at`, `created_at`  
  ) values ('selim', 'Project owner', 'User is an owner of a given project', '2016-07-27 11:44:46', '2016-07-27 11:44:46') ; 

<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $create_invoice = new Permission();
        $create_invoice->name = 'create_invoice';
        $create_invoice->display_name = 'Create Invoices';
        $create_invoice->description = 'Create new invoices';
        $create_invoice->save();

        $edit_invoice = new Permission();
        $edit_invoice->name = 'edit_invoice';
        $edit_invoice->display_name = 'Edit Invoices';
        $edit_invoice->description = 'Edit new invoices';
        $edit_invoice->save();

        $edit_invoice = new Permission();
        $edit_invoice->name = 'edit_invoice1';
        $edit_invoice->display_name = 'Edit1 Invoices';
        $edit_invoice->description = 'Edit1 new invoices';
        $edit_invoice->save();
    }
}

$ php artisan db:seed --class=PermissionSeeder --verbose

<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
//      DB::table('users')->delete();
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('password')
            // 'password' => Hash::make('password')
        ]);
    }
}

$ php artisan db:seed --class=UserSeeder --verbose

this will create entry to users table

<?php

use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{

    public function up()
    {
        Schema::table('role_user', function ($table) {
            //$table->string('name', 50)->change();
            //$table->string('permissions')->after('description');
            //$table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id','role_id']);    
        });
    }
    public function down()
    {
    }
}


$ php artisan migrate --verbose

which will add two columns user_id and role_id; associate foreign key constraint.

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

mysql> ALTER TABLE `permissions` ADD `id` INT(11) NOT NULL FIRST;
mysql> ALTER TABLE `permissions` CHANGE `id` `id` INT(11) UNSIGNED NOT NULL; 


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionRole extends Migration
{
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned;
            $table->integer('role_id')->unsigned;
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['permission_id','role_id']);
        });
    }


    public function down()
    {

    }
}

Due to foreign constraint error partial table
CREATE TABLE `permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


alter table `permission_role` 
add constraint `permission_role_id_fk` 
foreign key (`permission_id`) 
references `permissions` (`id`) 
on delete cascade on update cascade; 

mysql> alter table `permission_role`  add constraint `permission_role_fk`  foreign key (`role_id`)  
    -> references `roles` (`id`)  on delete cascade on update cascade;
Query OK, 0 rows affected (0.03 sec)
Records: 0  Duplicates: 0  Warnings: 0

routes.php
$api->version('v1', function ($api) {
    $api->get('hello', 'App\Http\Controllers\HomeController@index');
    $api->get('users/{user_id}/roles/{role_name}', 'App\Http\Controllers\HomeController@attachUserRole');
});


$ php artisan api:routes
uri: GET|HEAD /api/users/{user_id}/roles/{role_name}
$ curl --request GET http://localhost:8000/api/users/1/roles/owner
{"user":{"id":1,"name":"John1 Doe1","email":"john.doe1@gmail.com","created_at":"2016-07-27 17:57:23","updated_at":"2016-07-27 17:57:23"}}

//Lets say owner is an entry at roles table

this will create first entry to role_user table because of the FK constraint

 public function getUserRole($userId)
    {
        return App\User::find($userId)->roles;

    }

$api->get('users/{user_id}/roles', 'App\Http\Controllers\HomeController@getUserRole');

$ curl --request GET http://localhost:8000/api/users/1/roles
{"roles":[{"id":1,"name":"owner","display_name":"This is Owner","description":"Owners description","created_at":null,"updated_at":null,"pivot":{"user_id":1,"role_id":1}},{"id":1,"name":"owner","display_name":"This is Owner","description":"Owners description","created_at":null,"updated_at":null,"pivot":{"user_id":1,"role_id":1}}]}
again, this will create first entry to role_user table because of the FK constraint

===================== Errors ======================
[ReflectionException]
Class UserTableSeeder does not exist

Solved: by adding

namespace database\seeds;

and then running command:

composer dump-autoload --no-dev


  public function attachPermission(Request $request)
    {
        $parameters = $request->only('permission','role');
        $permissionParam = $parameters['permission'];
        $roleParam = $parameters['role'];
        $role = App\Role::where('name',$roleParam)->first();
        $permission = App\Permission::where('name',$permissionParam)->first();
        $role->attachPermission($permission);
        //return $role->permissions;
        return $this->response->created();
    }

$api->post('role/permission/add', 'App\Http\Controllers\HomeController@attachPermission');

https://github.com/Selimcse98/Laravel-REST-Api-Dingo
url: http://localhost:8000/api/role/permission/add
curl -X POST -H "Content-Type: application/json" -d '{"role":"owner","permission":"create_invoice"}' http://localhost:8000/api/role/permission/add
curl -X POST -H "Content-Type: application/json" -d '{"role":"manager","permission":"write"}' http://localhost:8000/api/role/permission/add

public function getPermissions($roleParam)
    {//$api->get('roles/{role}/permissions', 'App\Http\Controllers\HomeController@getPermissions');
        $role = App\Role::where('name',$roleParam)->first();
        return $role->perms;
    }//http://localhost:8000/api/roles/owner/permissions

$ curl --request GET http://localhost:8000/api/roles/owner/permissions

{
  "permissions": [
    {
      "id": 1,
      "name": "create_invoice",
      "display_name": "Create Invoices",
      "description": "Create new invoices",
      "created_at": "2016-07-27 17:58:44",
      "updated_at": "2016-07-27 17:58:44",
      "pivot": {
        "role_id": 1,
        "permission_id": 1
      }
    }
  ]
}

$ curl --request GET http://localhost:8000/api/roles/manager/permissions

{
  "permissions": [
    {
      "id": 2,
      "name": "write",
      "display_name": "writing permission",
      "description": "description of writing permission",
      "created_at": null,
      "updated_at": null,
      "pivot": {
        "role_id": 2,
        "permission_id": 2
      }
    }
  ]
}

==================================================================================================================
curl -X POST -H "Content-Type: application/json" -d '{"role":"manager","permission":"write"}' http://localhost:8000/api/role/permission/add
curl -X POST -H "Content-Type: application/json" -d '{"role":"manager","permission":"create_invoice"}' http://localhost:8000/api/role/permission/add
curl -X POST -H "Content-Type: application/json" -d '{"role":"manager","permission":"commander"}' http://localhost:8000/api/role/permission/add
curl -X POST -H "Content-Type: application/json" -d '{"role":"manager","permission":"read"}' http://localhost:8000/api/role/permission/add

curl --request GET http://localhost:8000/api/roles/manager/permissions

{
  "permissions": [
    {
      "id": 1,
      "name": "create_invoice",
      "display_name": "Create Invoices",
      "description": "Create new invoices",
      "created_at": "2016-07-27 17:58:44",
      "updated_at": "2016-07-27 17:58:44",
      "pivot": {
        "role_id": 2,
        "permission_id": 1
      }
    },
    {
      "id": 2,
      "name": "write",
      "display_name": "writing permission",
      "description": "description of writing permission",
      "created_at": null,
      "updated_at": null,
      "pivot": {
        "role_id": 2,
        "permission_id": 2
      }
    },
    {
      "id": 2,
      "name": "write",
      "display_name": "writing permission",
      "description": "description of writing permission",
      "created_at": null,
      "updated_at": null,
      "pivot": {
        "role_id": 2,
        "permission_id": 2
      }
    },
    {
      "id": 3,
      "name": "commander",
      "display_name": "Create commander",
      "description": "Create new commander",
      "created_at": "2016-07-27 17:58:44",
      "updated_at": "2016-07-27 17:58:44",
      "pivot": {
        "role_id": 2,
        "permission_id": 3
      }
    },
    {
      "id": 4,
      "name": "read",
      "display_name": "read permission",
      "description": "description of reading permission",
      "created_at": null,
      "updated_at": null,
      "pivot": {
        "role_id": 2,
        "permission_id": 4
      }
    }
  ]
}

==================================================== Database ====================================================
show create table users;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

show create table roles;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

show create table role_user;
//this database is populated by GET commands
$ curl --request GET http://localhost:8000/api/users/3/roles/owner
{"user":{"id":3,"name":"wahida moon","email":"wahida.doe@gmail.com","created_at":"2016-07-27 17:57:23","updated_at":"2016-07-27 17:57:23"}}

$ curl --request GET http://localhost:8000/api/users/2/roles/owner
{"user":{"id":2,"name":"John Doe","email":"john.doe@gmail.com","created_at":"2016-07-27 17:57:23","updated_at":"2016-07-27 17:57:23"}}

$ curl --request GET http://localhost:8000/api/users/1/roles/owner
{"user":{"id":1,"name":"John1 Doe1","email":"john.doe1@gmail.com","created_at":"2016-07-27 17:57:23","updated_at":"2016-07-27 17:57:23"}}

$ curl --request GET http://localhost:8000/api/users/1/roles/owner
$ curl --request GET http://localhost:8000/api/users/1/roles/manager
$ curl --request GET http://localhost:8000/api/users/1/roles/driver

so, user 1 has 3 roles
$ curl --request GET http://localhost:8000/api/users/1/roles
will show all the roles associated with user 1

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

show create table permissions;
CREATE TABLE `permissions` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

show create table permission_role;
CREATE TABLE `permission_role` (
  `permission_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  KEY `permission_role_id_fk` (`permission_id`),
  KEY `permission_role_fk` (`role_id`),
  CONSTRAINT `permission_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_id_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

=================================== database values =================================
select * from users;

1	John1 Doe1	john.doe1@gmail.com	$2y$10$Qg3atB.5oavbEN79Mr20J.XgleiYw3jcPFHvVfYhrAZ1IcHmkSZze	NULL	2016-07-27 17:57:23	2016-07-27 17:57:23
2	John Doe	john.doe@gmail.com	$2y$10$Qg3atB.5oavbEN79Mr20J.XgleiYw3jcPFHvVfYhrAZ1IcHmkSZze	NULL	2016-07-27 17:57:23	2016-07-27 17:57:23
3	wahida moon	wahida.doe@gmail.com	$2y$10$Qg3atB.5oavbEN79Mr20J.XgleiYw3jcPFHvVfYhrAZ1IcHmkSZze	NULL	2016-07-27 17:57:23	2016-07-27 17:57:23

select * from roles;
1	owner	This is Owner	Owners description	NULL	NULL
2	manager	This is Manager	Description of Manager	NULL	NULL
3	driver	This is driver	Driver description	NULL	NULL

select * from permissions;
1	create_invoice	Create Invoices	Create new invoices	2016-07-27 17:58:44	2016-07-27 17:58:44
2	write	writing permission	description of writing permission	NULL	NULL
3	commander	Create commander	Create new commander	2016-07-27 17:58:44	2016-07-27 17:58:44
4	read	read permission	description of reading permission	NULL	NULL

=================================== relation values =================================
permission_role:


<html>
<body>
<h2>============================= Database relationship status =============================</h2>
<img src="permission_role.png" alt="permission_role relations" style="width:128px;height:128px;">
<img src="role_user.png" alt="permission_role relations" style="width:128px;height:128px;">
</body>
</html>

