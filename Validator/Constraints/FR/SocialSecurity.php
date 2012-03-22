<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\FR;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SocialSecurity extends Constraint
{
    public $message = 'This value is not a valid FR Social Security number';
}