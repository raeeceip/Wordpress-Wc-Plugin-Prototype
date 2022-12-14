<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc52c431b8e1e2bfa8e3b10787c78d87f
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

        spl_autoload_register(array('ComposerAutoloaderInitc52c431b8e1e2bfa8e3b10787c78d87f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc52c431b8e1e2bfa8e3b10787c78d87f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc52c431b8e1e2bfa8e3b10787c78d87f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
