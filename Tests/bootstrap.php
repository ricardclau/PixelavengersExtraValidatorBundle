<?php

$vendorDir = __DIR__ . '/../vendor';

if (!@include $vendorDir . '/.composer/autoload.php') {
    die("You must set up the project dependencies, run the following commands:
wget http://getcomposer.org/composer.phar
php composer.phar install
");
}

require_once $vendorDir . '/symfony/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

spl_autoload_register(function($class) {
    if (0 === (strpos($class, 'Pixelavengers\\Bundle\\ExtraValidatorBundle\\'))) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 3)).'.php';

        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony' => array($vendorDir.'/symfony/src', $vendorDir.'/bundles'),
    'Doctrine\\Common' => $vendorDir.'/doctrine-common/lib',
));
$loader->register();