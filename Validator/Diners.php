<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

/**
 * @Annotation
 */
class Diners extends CreditCard
{
    public $message = 'This value is not a valid Diners Card';
}