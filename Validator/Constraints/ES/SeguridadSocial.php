<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SeguridadSocial extends Constraint
{
    public $message = 'This value is not a valid ES Seguridad Social number';
}