<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb07802874c7581196976e6e6fcb0e9a4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb07802874c7581196976e6e6fcb0e9a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb07802874c7581196976e6e6fcb0e9a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb07802874c7581196976e6e6fcb0e9a4::$classMap;

        }, null, ClassLoader::class);
    }
}
