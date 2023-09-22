<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1067fbaa879b0f38251e7266219588c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1067fbaa879b0f38251e7266219588c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1067fbaa879b0f38251e7266219588c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf1067fbaa879b0f38251e7266219588c::$classMap;

        }, null, ClassLoader::class);
    }
}
