<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Discover extends CreditCard
{
    public $message = 'This value is not a valid Discover Card';
}