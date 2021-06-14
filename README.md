### Startup

First of all we need to start the project with docker-compose. In the root directory run the following command:

```sh
docker-compose up -d
```

Output:

Creating network "laravel_socialmedia" with driver "bridge"
Creating socialmedia-db      ... done
Creating socialmedia-app    ... done
Creating socialmedia-nginx ... done

Next we need to install composer dependencies inside the app service:

```sh
docker-compose exec app composer install
```

You should see a similar output:

Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 104 installs, 0 updates, 0 removals

  - Downloading doctrine/inflector (2.0.3)
  - Downloading doctrine/lexer (1.2.1)
  - Downloading symfony/polyfill-ctype (v1.23.0)
  - Downloading webmozart/assert (1.10.0)
  - Downloading dragonmantank/cron-expression (v3.1.0)
  - ...
  - Installing doctrine/inflector (2.0.3): Extracting archive
  - Installing doctrine/lexer (1.2.1): Extracting archive
  - Installing symfony/polyfill-ctype (v1.23.0): Extracting archive
  - Installing webmozart/assert (1.10.0): Extracting archive
  - Installing dragonmantank/cron-expression (v3.1.0): Extracting archive

Generating optimized autoload files
Illuminate\Foundation\ComposerScripts::postAutoloadDump
@php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/sail
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.

Great! The application is up and running!

Now you can import the Postman collection file `Laravel App.postman_collection.json` and play with the api's.
