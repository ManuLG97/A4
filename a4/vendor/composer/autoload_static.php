<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1ff29942fe043d13df3caacf7f5459d
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rentit\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rentit\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1ff29942fe043d13df3caacf7f5459d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1ff29942fe043d13df3caacf7f5459d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}