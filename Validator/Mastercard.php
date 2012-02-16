<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

/**
 * @Annotation
 */
class Mastercard extends CreditCard
{
    public $message = 'This value is not a valid Mastercard Card';
}