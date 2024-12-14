[1mdiff --git a/bootstrap/app.php b/bootstrap/app.php[m
[1mindex 3682ec3..d654276 100644[m
[1m--- a/bootstrap/app.php[m
[1m+++ b/bootstrap/app.php[m
[36m@@ -12,10 +12,7 @@[m
         health: '/up',[m
     )[m
     ->withMiddleware(function (Middleware $middleware) {[m
[31m-<<<<<<< HEAD[m
         //[m
[31m-=======[m
[31m->>>>>>> fb/main[m
     })[m
     ->withExceptions(function (Exceptions $exceptions) {[m
         //[m
[1mdiff --git a/composer.json b/composer.json[m
[1mindex ab551ed..a56ec26 100644[m
[1m--- a/composer.json[m
[1m+++ b/composer.json[m
[36m@@ -2,12 +2,10 @@[m
     "name": "laravel/laravel",[m
     "type": "project",[m
     "description": "The skeleton application for the Laravel framework.",[m
[31m-<<<<<<< HEAD[m
     "keywords": ["laravel", "framework"],[m
     "license": "MIT",[m
     "require": {[m
         "php": "^8.2",[m
[31m-=======[m
     "keywords": [[m
         "laravel",[m
         "framework"[m
[36m@@ -16,7 +14,6 @@[m
     "require": {[m
         "php": "^8.2",[m
         "fruitcake/php-cors": "^1.3",[m
[31m->>>>>>> fb/main[m
         "guzzlehttp/guzzle": "^7.9",[m
         "laravel/framework": "^11.0",[m
         "laravel/sanctum": "^4.0",[m
