Api
=========

Package provide some materials for api laravel 5

Installation
----

Update your `composer.json` file to include this package as a dependency

Laravel 5 & Lumen

```json
"oangia/api": "v1.0.*"
```

Register with service provider `config\app.php`

```php
oangia\Api\Providers\ApiServiceProvider::class,
```

Register with kenel, put in routeMiddleware

```php
'wants.json'    => \oangia\Api\Middleware\WantsJson::class,
'log.requests'  => \oangia\Api\Middleware\LogRequests::class,
'auth.api'      => \oangia\Api\Middleware\AuthenticateWithToken::class,
```

Config user model at `config\api.php`

```php
'user_class' => \App\Models\User::class,
```
