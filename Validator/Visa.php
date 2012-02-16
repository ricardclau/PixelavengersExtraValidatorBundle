<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

/**
 * @Annotation
 */
class Visa extends CreditCard
{
    public $message = 'This value is not a valid Visa Card';
}