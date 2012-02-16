<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Mastercard extends CreditCard
{
    public $message = 'This value is not a valid Mastercard Card';
}