<?php
namespace Composer\Autoload;

class ComposerStaticInitbe04a354b47c0ca31110009a9751932c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\' => 13,
        ),
    );
    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/backend/myapi',
        ),
    );
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );
    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe04a354b47c0ca31110009a9751932c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe04a354b47c0ca31110009a9751932c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe04a354b47c0ca31110009a9751932c::$classMap;

        }, null, ClassLoader::class);
    }
}