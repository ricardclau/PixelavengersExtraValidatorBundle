PixelavengersExtraValidatorBundle
=================================

Welcome to Pixelavengers Extra Validator Bundle.
This bundle provides some useful validators for common website cases.

Current validators:

WorldWide
---------

* **CreditCard**, both generic and specific validators for: **Visa**, **Mastercard**, **American Express**, **Discover**, **JCB**, **Diners**
* **CVV**

Spain
-----

* **ESSeguridadSocial** identifiers for public health system
* **ESPhoneNumber**, both mobile and fixed

France
------

* **FRSocialSecurity** identifiers for public health system (thx to [npotier](https://github.com/npotier))

[![Build Status](https://secure.travis-ci.org/ricardclau/PixelavengersExtraValidatorBundle.png?branch=master)](http://travis-ci.org/ricardclau/PixelavengersExtraValidatorBundle)

Installation
---------------

### Download via git submodule

    git submodule add git://github.com/ricardclau/PixelavengersExtraValidatorBundle.git vendor/bundles/Pixelavengers/Bundle/ExtraValidatorBundle

### Download by editing deps file

    [PixelavengersExtraValidatorBundle]
        git=http://github.com/ricardclau/PixelavengersExtraValidatorBundle.git
        target=/bundles/Pixelavengers/Bundle/ExtraValidatorBundle
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
            new Pixelavengers\Bundle\ExtraValidatorBundle\PixelavengersExtraValidatorBundle(),
        );
    }
