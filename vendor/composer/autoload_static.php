<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd666fcec86cba871c509c268e4cbb5a3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd666fcec86cba871c509c268e4cbb5a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd666fcec86cba871c509c268e4cbb5a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd666fcec86cba871c509c268e4cbb5a3::$classMap;

        }, null, ClassLoader::class);
    }
}
