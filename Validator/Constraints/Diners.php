<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Diners extends CreditCard
{
    public $message = 'This value is not a valid Diners Card';
}