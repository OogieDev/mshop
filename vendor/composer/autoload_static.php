<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17eab7b3a56502f8eaec805c0968ebe4
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'ishop\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ishop\\' => 
        array (
            0 => __DIR__ . '/..' . '/ishop/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17eab7b3a56502f8eaec805c0968ebe4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17eab7b3a56502f8eaec805c0968ebe4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
