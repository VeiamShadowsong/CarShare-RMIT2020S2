# RMIT CAR SHARE 2020 S2

This is a graduation project of RMIT 2020 S2 [Car Share](https://github.com/VeiamShadowsong/CarShare-RMIT2020S2) project that will easily build a project based on [Laravel](https://laravel.com) Private car sharing website.

## Getting started

### Launch the starter project

*(Assuming you've [installed Laravel](https://laravel.com/docs/5.5/installation))*

Fork this repository, then clone your fork, and run this in your newly created directory:

``` bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.

Run the following command to generate your app key:

```
php artisan key:generate
```

Config environment setting

```
cp .env.example .env
```

Or custom the environment file 

```
vim .env
```

Migrate the database

```
php artisan migrate
```

Run database default seed

```
php artisan db:seed
```

Car share website is now up and running! 

### Configure the starter project

Edit the `config/prismic.php` prismic configuration file to get the application connected to the correct repository:

```
'url' => 'https://your-repo-name.prismic.io/api/v2',
```

## Licence

This software is licensed under the Apache 2 license, quoted below.

Copyright 2018 Prismic.io (https://prismic.io).

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.