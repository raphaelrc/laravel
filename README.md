### Startup

First of all we need to start the project with docker-compose. In the root directory run the following command:

```sh
docker-compose up -d
```

Output:

Creating network "laravel_socialmedia" with driver "bridge"<br>
Creating socialmedia-db      ... done<br>
Creating socialmedia-app    ... done<br>
Creating socialmedia-nginx ... done<br>

Next we need to install composer dependencies inside the app service:

```sh
docker-compose exec app composer install
```

You should see a similar output:

Installing dependencies from lock file (including require-dev)<br>
Verifying lock file contents can be installed on current platform.<br>
Package operations: 104 installs, 0 updates, 0 removals<br>

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

Generating optimized autoload files<br>
Illuminate\Foundation\ComposerScripts::postAutoloadDump<br>
@php artisan package:discover --ansi<br>
Discovered Package: facade/ignition<br>
Discovered Package: fideloper/proxy<br>
Discovered Package: fruitcake/laravel-cors<br>
Discovered Package: laravel/sail<br>
Discovered Package: laravel/tinker<br>
Discovered Package: nesbot/carbon<br>
Discovered Package: nunomaduro/collision<br>
Package manifest generated successfully.<br>
74 packages you are using are looking for funding.<br>
Use the `composer fund` command to find out more!<br>

### Done

Great! The application is up and running!

Now you can import the Postman collection file `Laravel App.postman_collection.json` and play with the api's.
