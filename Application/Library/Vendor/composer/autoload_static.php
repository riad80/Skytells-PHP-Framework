<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit29a2ba8a317ce8bdafc84022077ae207
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'IntiliSense\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'IntiliSense\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/IntiliSense/src/IntiliSense',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit29a2ba8a317ce8bdafc84022077ae207::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit29a2ba8a317ce8bdafc84022077ae207::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
