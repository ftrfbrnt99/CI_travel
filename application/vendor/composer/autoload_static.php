<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cebac4f77b702bdc7a135563f1e8876
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cebac4f77b702bdc7a135563f1e8876::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cebac4f77b702bdc7a135563f1e8876::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0cebac4f77b702bdc7a135563f1e8876::$classMap;

        }, null, ClassLoader::class);
    }
}