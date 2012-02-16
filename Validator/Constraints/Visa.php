<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Visa extends CreditCard
{
    public $message = 'This value is not a valid Visa Card';
}