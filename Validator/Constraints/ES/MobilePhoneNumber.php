<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MobilePhoneNumber extends Constraint
{
    public $message = 'This value is not a valid ES Mobile Phone number';
}