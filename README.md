# Hms Support

Support package providing commonly used packages via service providers and inflectors.

All ServiceProviders require [league/container 2](https://packagist.org/packages/league/container#2.0.3).

### ConfigServiceProvider

```
use Hms\Support\ServiceProvider\ConfigServiceProvider;

$container->addServiceProvider(new ConfigServiceProvider([
    'path' => __DIR__ . '/../config/config.php',
    'env' => __DIR__ . '/../.env'
]));
```

##### Dependencies

* [gorka/dot-notation-access](https://packagist.org/packages/gorka/dot-notation-access)
* [josegonzalez/dotenv](https://packagist.org/packages/josegonzalez/dotenv)

### AuraSqlServiceProvider

```
use Hms\Support\ServiceProvider\AuraSqlServiceProvider;

$container->addServiceProvider(new AuraSqlServiceProvider('mysql'));
```

Database credentials should exist in your `.env` file in the following format.

```
DATABASE_HOST={{ host }}
DATABASE_NAME={{ db_name }}
DATABASE_USER={{ username }}
DATABASE_PASS={{ password }}
```

##### Dependencies

* [aura/sql](https://packagist.org/packages/aura/sql)
* [aura/sqlquery](https://packagist.org/packages/aura/sqlquery)

### SwiftMailerServiceProvider

```
use Hms\Support\ServiceProvider\SwiftMailerServiceProvider;

$container->addServiceProvider(new SwiftMailerServiceProvider);
```

##### Dependencies

* [swiftmailer/swiftmailer](https://packagist.org/packages/swiftmailer/swiftmailer)


### TwigServiceProvider

```
use Hms\Support\ServiceProvider\TwigServiceProvider;

$container->addServiceProvider(new TwigServiceProvider([
    'templates'  => __DIR__ . '/../templates',
    'cache' => __DIR__ . '/../writable/directory',
    'extensions' => [
        'Acme\Tekkers\UnbelievableTekkersExtension'
        'Acme\Large\LargeGravyExtension'
    ]
]));
```

##### Dependencies

* [twig/twig](https://packagist.org/packages/twig/twig)

### AuraSessionServiceProvider

```
use Hms\Support\ServiceProvider\AuraSessionServiceProvider;

$container->addServiceProvider(new AuraSessionServiceProvider);
```

##### Dependencies

* [aura/session](https://packagist.org/packages/aura/session)
