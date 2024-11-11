<?php
class ComposerAutoloaderInitbe04a354b47c0ca31110009a9751932c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }
    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }
        spl_autoload_register(array('ComposerAutoloaderInitbe04a354b47c0ca31110009a9751932c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbe04a354b47c0ca31110009a9751932c', 'loadClassLoader'));
        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbe04a354b47c0ca31110009a9751932c::getInitializer($loader));
        $loader->register(true);
        return $loader;
    }
}