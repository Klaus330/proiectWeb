<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit405b6f8e775a4c9e47c5ed4ce358fadc
{
    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'ComposerAutoloaderInit405b6f8e775a4c9e47c5ed4ce358fadc' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit405b6f8e775a4c9e47c5ed4ce358fadc' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'HomeController' => __DIR__ . '/../..' . '/core/controllers/HomeController.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Router' => __DIR__ . '/../..' . '/core/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit405b6f8e775a4c9e47c5ed4ce358fadc::$classMap;

        }, null, ClassLoader::class);
    }
}