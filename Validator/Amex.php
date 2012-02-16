<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

/**
 * @Annotation
 */
class Amex extends CreditCard
{
    public $message = 'This value is not a valid American Express Card';
}