<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit184441b51895bc4a21e842da77d0e0fc
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'KnightWithKnife\\Exceptions\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'KnightWithKnife\\Exceptions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit184441b51895bc4a21e842da77d0e0fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit184441b51895bc4a21e842da77d0e0fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit184441b51895bc4a21e842da77d0e0fc::$classMap;

        }, null, ClassLoader::class);
    }
}