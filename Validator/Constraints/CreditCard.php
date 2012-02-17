<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CreditCard extends Constraint
{
    public $invalidChecksumMessage = 'This value is not a valid Credit Card';
}