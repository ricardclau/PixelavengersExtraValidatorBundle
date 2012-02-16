<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Amex extends CreditCard
{
    public $message = 'This value is not a valid American Express Card';
}