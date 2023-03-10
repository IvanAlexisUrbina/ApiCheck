<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit877a0d97c68e0a31002e6e903f23ad76
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'A' => 
        array (
            'AmazonPay\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'AmazonPay\\' => 
        array (
            0 => __DIR__ . '/..' . '/amzn/amazon-pay-sdk-php/AmazonPay',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit877a0d97c68e0a31002e6e903f23ad76::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit877a0d97c68e0a31002e6e903f23ad76::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit877a0d97c68e0a31002e6e903f23ad76::$classMap;

        }, null, ClassLoader::class);
    }
}
