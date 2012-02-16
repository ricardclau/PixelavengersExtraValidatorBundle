<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

/**
 * @Annotation
 */
class Jcb extends CreditCard
{
    public $message = 'This value is not a valid Jcb Card';
}