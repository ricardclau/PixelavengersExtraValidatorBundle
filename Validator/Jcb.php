<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

/**
 * @Annotation
 */
class Jcb extends CreditCard
{
    public $message = 'This value is not a valid Jcb Card';
}