<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class FixedPhoneNumber extends Constraint
{
    public $message = 'This value is not a valid ES Fixed Phone number';
}