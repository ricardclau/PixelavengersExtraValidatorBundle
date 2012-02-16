<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

/**
 * @Annotation
 */
class Discover extends CreditCard
{
    public $message = 'This value is not a valid Discover Card';
}