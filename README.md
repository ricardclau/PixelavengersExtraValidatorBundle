PixelavengersExtraValidationBundle
=================================

Welcome to Pixelavengers Extra Validation Bundle.
This bundle provides some useful validators for common website cases.

Installation
---------------

### Download via git submodule

    git submodule add git://github.com/ricardclau/PixelavengersExtraValidationBundle.git vendor/bundles/Pixelavengers/Bundle/ExtraValidationBundle

### Download by editing deps file

    [PixelavengersExtraValidationBundle]
        git=http://github.com/ricardclau/PixelavengersExtraValidationBundle.git
        target=/bundles/Pixelavengers/Bundle/ExtraValidationBundle
        version=origin/master

### Modify autoload.php and instantiate bundle in AppKernel.php


    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Pixelavengers'                       => __DIR__.'/../vendor/bundles',
    ));

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Pixelavengers\Bundle\ExtraValidationBundle\PixelavengersExtraValidationBundle(),
        );
    }
